<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestLoggerController extends AbstractController
{
    #[Route('/test-logger', name: 'test_logger')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->debug('Test logger message', [], 'security');
        return new Response('Logger test executed. Check var/log/security.log.');
    }
}