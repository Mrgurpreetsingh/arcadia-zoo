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
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Affiche la page dashboard EasyAdmin par défaut
        //return parent::index();
        
        // Si tu veux afficher un template Twig personnalisé, remplace par :
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia Zoo Admin')
            ->setFaviconPath('favicon.ico'); // optionnel, à ajuster
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        
        yield MenuItem::section('Gestion du Zoo');
        yield MenuItem::linkToCrud('Animaux', 'fas fa-paw', Animal::class);
        yield MenuItem::linkToCrud('Habitats', 'fas fa-tree', Habitat::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-concierge-bell', Service::class);

        yield MenuItem::section('Utilisateurs et Avis');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-star', Review::class);

        yield MenuItem::section('Santé et Contact');
        yield MenuItem::linkToCrud('Consommation Alimentaire', 'fas fa-utensils', FoodConsumption::class);
        yield MenuItem::linkToCrud('Rapports Vétérinaires', 'fas fa-stethoscope', VeterinaryReport::class);
        yield MenuItem::linkToCrud('Demandes de Contact', 'fas fa-envelope', ContactRequest::class);
        yield MenuItem::linkToCrud('Consultations Animaux', 'fas fa-clipboard-check', AnimalConsultation::class);
    }
}
