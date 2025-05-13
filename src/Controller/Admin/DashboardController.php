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
        // Rendre un template personnalisé pour le tableau de bord
        return $this->render('admin/dashboard.html.twig');
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
        yield MenuItem::linkToCrud('Animaux', 'fas fa-paw', Animal::class);
        yield MenuItem::linkToCrud('Habitats', 'fas fa-tree', Habitat::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-concierge-bell', Service::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-star', Review::class);
        yield MenuItem::linkToCrud('Consommation Alimentaire', 'fas fa-utensils', FoodConsumption::class);
        yield MenuItem::linkToCrud('Rapports Vétérinaires', 'fas fa-stethoscope', VeterinaryReport::class);
        yield MenuItem::linkToCrud('Demandes de Contact', 'fas fa-envelope', ContactRequest::class);
        yield MenuItem::linkToCrud('Consultations Animaux', 'fas fa-clipboard-check', AnimalConsultation::class);
    }
}