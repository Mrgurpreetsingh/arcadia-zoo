<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $race = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $images = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Habitat $habitat = null;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: VeterinaryReport::class)]
    private Collection $veterinaryReports;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: FoodConsumption::class)]
    private Collection $foodConsumptions;

    public function __construct()
    {
        $this->veterinaryReports = new ArrayCollection();
        $this->foodConsumptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;
        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): static
    {
        $this->images = $images;
        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->habitat;
    }

    public function setHabitat(Habitat $habitat): static
    {
        $this->habitat = $habitat;
        return $this;
    }

    public function getVeterinaryReports(): Collection
    {
        return $this->veterinaryReports;
    }

    public function addVeterinaryReport(VeterinaryReport $veterinaryReport): static
    {
        if (!$this->veterinaryReports->contains($veterinaryReport)) {
            $this->veterinaryReports->add($veterinaryReport);
            $veterinaryReport->setAnimal($this);
        }
        return $this;
    }

    public function removeVeterinaryReport(VeterinaryReport $veterinaryReport): static
    {
        if ($this->veterinaryReports->removeElement($veterinaryReport)) {
           // if ($veterinaryReport->getAnimal() === $this) {
           //     $veterinaryReport->setAnimal(null);
           // }
        }
        return $this;
    }

    public function getFoodConsumptions(): Collection
    {
        return $this->foodConsumptions;
    }

    public function addFoodConsumption(FoodConsumption $foodConsumption): static
    {
        if (!$this->foodConsumptions->contains($foodConsumption)) {
            $this->foodConsumptions->add($foodConsumption);
            $foodConsumption->setAnimal($this);
        }
        return $this;
    }

    public function removeFoodConsumption(FoodConsumption $foodConsumption): static
    {
        if ($this->foodConsumptions->removeElement($foodConsumption)) {
           // if ($foodConsumption->getAnimal() === $this) {
          //  }
        }
        return $this;
    }
}