<?php

namespace App\Entity;

use App\Repository\RecenzjaTabRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecenzjaTabRepository::class)]
class RecenzjaTab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_produktu = null;

    #[ORM\Column]
    private ?int $ocena = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $opis_recenzji = null;


    #[ORM\Column(length: 255)]
    private ?string $user_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduktu(): ?int
    {
        return $this->id_produktu;
    }

    public function setIdProduktu(int $id_produktu): static
    {
        $this->id_produktu = $id_produktu;

        return $this;
    }

    public function getOcena(): ?int
    {
        return $this->ocena;
    }

    public function setOcena(int $ocena): static
    {
        $this->ocena = $ocena;

        return $this;
    }

    public function getOpisRecenzji(): ?string
    {
        return $this->opis_recenzji;
    }

    public function setOpisRecenzji(?string $opis_recenzji): static
    {
        $this->opis_recenzji = $opis_recenzji;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): static
    {
        $this->user_email = $user_email;

        return $this;
    }
}
