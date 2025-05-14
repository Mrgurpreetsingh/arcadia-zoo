<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\Review;
use App\Entity\FoodConsumption;
use App\Entity\VeterinaryReport;
use App\Entity\ContactRequest;
use App\Entity\AnimalConsultation;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->redirectToRoute('admin', [
        'crudControllerFqcn' => \App\Controller\Admin\ReviewCrudController::class,
        'crudAction' => 'index',
    ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia Zoo Admin')
            ->setFaviconPath('favicon.ico');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Avis', 'fas fa-star', Review::class);
    }
}