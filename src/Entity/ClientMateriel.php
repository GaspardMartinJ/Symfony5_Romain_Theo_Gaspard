<?php

namespace App\Entity;

use App\Repository\ClientMaterielRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'client_materiel')]
#[ORM\Index(name: 'client_materiel_client_fk', columns: ['ID_CLIENT'])]
#[ORM\Index(name: 'client_materiel_materielr_fk', columns: ['ID_MATERIEL'])]
#[ORM\UniqueConstraint(name: 'client_materiel_uq', columns: ['ID_CLIENT', 'ID_MATERIEL'])]
#[ORM\Entity(repositoryClass: ClientMaterielRepository::class)]
class ClientMateriel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\JoinColumn(name: 'ID_CLIENT', referencedColumnName: 'ID')]
    #[ORM\ManyToOne(targetEntity: 'Client')]
    private $idClient;

    #[ORM\JoinColumn(name: 'ID_MATERIEL', referencedColumnName: 'ID')]
    #[ORM\ManyToOne(targetEntity: 'Materiel')]
    private $idMateriel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;
        return $this;
    }

    public function getIdMateriel(): ?Materiel
    {
        return $this->idMateriel;
    }

    public function setIdMateriel(?Materiel $idMateriel): self
    {
        $this->idMateriel = $idMateriel;
        return $this;
    }
}
