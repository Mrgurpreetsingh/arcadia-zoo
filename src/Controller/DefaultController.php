<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/test-log', name: 'test_log')]
    public function testLog(LoggerInterface $logger): Response
    {
        // On envoie un message dans le canal principal (main)
        $logger->info('Ceci est un message de test pour le canal main.');

        return new Response('Message de log envoyé !');
    }
}
