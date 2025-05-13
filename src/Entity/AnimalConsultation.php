<?php

namespace App\Entity;

use App\Repository\AnimalConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalConsultationRepository::class)]
class AnimalConsultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $animalName = null;

    #[ORM\Column]
    private ?int $consultationCount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimalName(): ?string
    {
        return $this->animalName;
    }

    public function setAnimalName(string $animalName): static
    {
        $this->animalName = $animalName;

        return $this;
    }

    public function getConsultationCount(): ?int
    {
        return $this->consultationCount;
    }

    public function setConsultationCount(int $consultationCount): static
    {
        $this->consultationCount = $consultationCount;

        return $this;
    }
}
