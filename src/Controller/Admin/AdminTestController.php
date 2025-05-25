<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminTestController
{
    #[Route('/admin-test', name: 'admin_test')]
    public function index(): Response
    {
        return new Response('Admin Test Route');
    }
}