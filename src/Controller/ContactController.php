<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Knp\Snappy\Pdf;
use App\Form\ContactType;
use App\DataClass\Contact;
use DateTime;

/**
 * Creates the views that allow the users send information to Mobilean
 * @Route(name="contact_")
 */
class ContactController extends AbstractController
{
    /**
     * Displays contact page
     * @Route("/contactez-nous", name="message")
     * @return Response
     */
    public function contact(Request $request, MailerInterface $mailer, Pdf $pdf): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // add date of message submission
            $contact->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $contact->setType('contact');

            // generate pdf
            $filename = 'Demande d\'Informations - ' . $contact->getFullName();
            // check if filename already exists
            $testFilename = $filename;
            $counter = 1;
            while (file_exists('assets/contact/' . $testFilename . '.pdf')) {
                $testFilename = $filename . '(' . $counter . ')';
                $counter++;
            }
            $filename = $testFilename . '.pdf';

            $pdf->generateFromHtml(
                $this->renderView(
                    'pdf.html.twig',
                    ['data'  => $contact,],
                ),
                'assets/contact/' . $filename
            );

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject($contact->getSubject())
                ->html($this->renderView('email.html.twig', [
                    'data' => $contact,
                ]))
                ->attachFromPath('assets/contact/' . $filename);
            $mailer->send($email);

            // return after submit page
            return $this->render('portfolio/after_submit.html.twig', [
                'data' => $contact,
            ]);
        }

        return $this->render('portfolio/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
