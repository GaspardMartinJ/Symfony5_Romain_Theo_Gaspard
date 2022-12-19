<?php

namespace App\Entity;

use App\Repository\MagasinRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagasinRepository::class)]
class Magasin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $Num_Siret = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getNumSiret(): ?string
    {
        return $this->Num_Siret;
    }

    public function setNumSiret(string $Num_Siret): self
    {
        $this->Num_Siret = $Num_Siret;

        return $this;
    }

    public function __toString()
    {
        return $this->Nom;
    }
}
