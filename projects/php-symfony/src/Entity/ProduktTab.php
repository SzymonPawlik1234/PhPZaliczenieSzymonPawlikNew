<?php

namespace App\Entity;

use App\Repository\ProduktTabRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduktTabRepository::class)]
class ProduktTab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typ = null;

    #[ORM\Column(length: 255)]
    private ?string $marka = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $cena = null;

    #[ORM\Column(length: 255)]
    private ?string $brzmienie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): static
    {
        $this->typ = $typ;

        return $this;
    }

    public function getMarka(): ?string
    {
        return $this->marka;
    }

    public function setMarka(string $marka): static
    {
        $this->marka = $marka;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getCena(): ?string
    {
        return $this->cena;
    }

    public function setCena(string $cena): static
    {
        $this->cena = $cena;

        return $this;
    }

    public function getBrzmienie(): ?string
    {
        return $this->brzmienie;
    }

    public function setBrzmienie(string $brzmienie): static
    {
        $this->brzmienie = $brzmienie;

        return $this;
    }
}
