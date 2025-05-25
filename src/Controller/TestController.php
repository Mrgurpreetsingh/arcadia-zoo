<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    #[Route('/test-route', name: 'test_route')]
    public function index(): Response
    {
        return new Response('Test Route');
    }
}