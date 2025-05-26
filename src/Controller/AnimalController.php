<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animaux', name: 'app_animals')]
    public function index(): Response
    {
        // Placeholder : Crée un template templates/animals/index.html.twig plus tard
        return $this->render('animals/index.html.twig');
    }

    #[Route('/animal/{id}', name: 'app_animal_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id): Response
    {
        // Placeholder : Logique pour récupérer les détails de l'animal avec l'ID $id
        return $this->render('animal/detail.html.twig', [
            'animal_id' => $id,
        ]);
    }
}