<?php

namespace App\Controller;

use App\Repository\EducationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="portfolio_")
 */
class PortfolioController extends AbstractController
{
    /**
     * @Route("/formations", name="education")
     */
    public function education(EducationRepository $educationRepo): Response
    {
        return $this->render('portfolio/education.html.twig',[
            'educations' => $educationRepo->findAll(),
        ]);
    }

    /**
     * @Route("/experiences", name="experience")
     */
    public function experience(): Response
    {
        return $this->render('portfolio/experience.html.twig');
    }

    /**
     * @Route("/projets", name="project")
     */
    public function project(): Response
    {
        return $this->render('portfolio/project.html.twig');
    }

    /**
     * @Route("/references", name="reference")
     */
    public function reference(): Response
    {
        return $this->render('portfolio/reference.html.twig');
    }
    /**
     * @Route("/competences", name="skill")
     */
    public function competence(): Response
    {
        return $this->render('portfolio/skill.html.twig');
    }
}
