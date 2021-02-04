<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Project;
use App\Entity\Reference;
use App\Entity\Skill;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Monportfolio');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Formations', 'fas fa-graduation-cap', Education::class);
        yield MenuItem::linkToCrud('Projets', 'fa fa-list', Project::class);
        yield MenuItem::linkToCrud('References', 'fas fa-asterisk', Reference::class);
        yield MenuItem::linkToCrud('Compétences', 'fa fa-list', Skill::class);
        yield MenuItem::linkToCrud('Experiences', 'fa fa-list', Experience::class);
    }
}
