<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitats')]
    public function index(): Response
    {
        return $this->render('habitats/index.html.twig');
    }

    #[Route('/habitats/{id}', name: 'app_habitat_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id): Response
    {
        // Placeholder : À terme, tu récupéreras les données de l'habitat via une base de données
        $habitat = [
            'id' => $id,
            'name' => 'Savane',
            'description' => 'Un écosystème africain avec des lions, des éléphants, et plus encore.',
            'animals' => [
                ['name' => 'Lion', 'race' => 'Félin'],
                ['name' => 'Éléphant', 'race' => 'Proboscidien'],
            ],
        ];

        return $this->render('habitats/detail.html.twig', [
            'habitat' => $habitat,
        ]);
    }
}