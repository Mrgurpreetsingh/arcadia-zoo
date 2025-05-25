<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig');
    }

    #[Route('/contact/submit', name: 'app_contact_submit', methods: ['POST'])]
    public function submit(Request $request): Response
    {
        $this->isCsrfTokenValid('contact_form', $request->request->get('_csrf_token'));

        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $email = $request->request->get('email');

        // Logique de sauvegarde (ex. base de données)

        return $this->redirectToRoute('app_contact');
    }
}