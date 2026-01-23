<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animaux', name: 'app_animals')]
    public function index(AnimalRepository $animalRepository): Response
    {
        $animals = $animalRepository->findAll();
        return $this->render('animals/index.html.twig', [
            'animals' => $animals,
        ]);
    }

    #[Route('/animal/{id}', name: 'app_animal_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id, AnimalRepository $animalRepository): Response
    {
        $animal = $animalRepository->find($id);
        if (!$animal) {
            throw $this->createNotFoundException('Animal non trouvé');
        }
        return $this->render('animals/detail.html.twig', [
            'animal' => $animal,
        ]);
    }
}