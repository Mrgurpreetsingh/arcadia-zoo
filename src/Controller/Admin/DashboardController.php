<?php

namespace App\Controller\Admin;

use App\Entity\TestEntity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

   #[Route('/admin', name: 'admin')]
public function index(): Response
{
    return $this->render('admin/layout_minimal.html.twig', [
        'dashboardTitle' => 'Arcadia Zoo Admin - Test Minimal',
    ]);
}

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Arcadia Zoo Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Test', 'fas fa-paw', TestEntity::class);
    }
}

