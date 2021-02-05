<?php

namespace App\Controller;

use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\ReferenceRepository;
use App\Repository\SkillRepository;
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
     * @param EducationRepository $educationRepo
     * @return Response
     */
    public function education(EducationRepository $educationRepo): Response
    {
        return $this->render('portfolio/education.html.twig',[
            'educations' => $educationRepo->findAll(),
        ]);
    }

    /**
     * @Route("/experiences", name="experience")
     * @param ExperienceRepository $experienceRepo
     * @return Response
     */
    public function experience(ExperienceRepository $experienceRepo): Response
    {
        return $this->render('portfolio/experience.html.twig', [
            'experiences' => $experienceRepo->findAll(),
            ]);
    }

    /**
     * @Route("/projets", name="project")
     * @param ProjectRepository $projectRepo
     * @return Response
     */
    public function project(ProjectRepository $projectRepo ): Response
    {
        return $this->render('portfolio/project.html.twig', [
            'projects' => $projectRepo->findAll(),
        ]);
    }

    /**
     * @Route("/references", name="reference")
     * @param ReferenceRepository $referenceRepo
     * @return Response
     */
    public function reference(ReferenceRepository $referenceRepo): Response
    {
        return $this->render('portfolio/reference.html.twig'
            , [
                'reference' => $referenceRepo->findAll(),
            ]);
    }

    /**
     * @Route("/competences", name="skill")
     * @param SkillRepository $skillRepo
     * @return Response
     */
    public function competence(SkillRepository $skillRepo): Response
    {
        return $this->render('portfolio/skill.html.twig',[
            'skills' => $skillRepo->findAll(),
        ]);
    }

    /**
     * @Route("/mention-leagales", name="legacy")
     * @return Response
     */
    public function legacy(): Response
    {
        return $this->render('portfolio/legacy.html.twig');
    }
}
