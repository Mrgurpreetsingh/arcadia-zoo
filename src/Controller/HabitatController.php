<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitats')]
    public function index(HabitatRepository $habitatRepository): Response
    {
        $habitats = $habitatRepository->findAll();
        return $this->render('habitats/index.html.twig', [
            'habitats' => $habitats,
        ]);
    }

    #[Route('/habitats/{id}', name: 'app_habitat_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id, HabitatRepository $habitatRepository): Response
    {
        $habitat = $habitatRepository->find($id);
        if (!$habitat) {
            throw $this->createNotFoundException('Habitat non trouvé');
        }
        return $this->render('habitats/detail.html.twig', [
            'habitat' => $habitat,
        ]);
    }
}