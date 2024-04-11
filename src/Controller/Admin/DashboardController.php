<?php

namespace App\Controller\Admin;

use App\Entity\Score;
use App\Entity\Team;
use App\Entity\Token;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/enigma', name: 'enigma')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(TokenCrudController::class)
        ->generateUrl();
        return $this->redirect($url);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ctf Panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Tokens', 'fa-solid fa-tags', Token::class);
        yield MenuItem::linkToCrud('Equipes', 'fas fa-users', Team::class);
        yield MenuItem::linkToCrud('Score', 'fas fa-dice', Score::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-user-secret', User::class);
    }
}

