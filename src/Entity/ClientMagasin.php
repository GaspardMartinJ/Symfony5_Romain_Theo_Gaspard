<?php

namespace App\Entity;

use App\Repository\ClientMagasinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'client_magasin')]
#[ORM\Index(name: 'client_magasin_client_fk', columns: ['ID_CLIENT'])]
#[ORM\Index(name: 'client_magasin_magasin_fk', columns: ['ID_MAGASIN'])]
#[ORM\UniqueConstraint(name: 'client_magasin_uq', columns: ['ID_CLIENT', 'ID_MAGASIN'])]
#[ORM\Entity(repositoryClass: ClientMagasinRepository::class)]
class ClientMagasin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\JoinColumn(name: 'ID_CLIENT', referencedColumnName: 'ID')]
    #[ORM\ManyToOne(targetEntity: 'Client')]
    private $idClient;

    #[ORM\JoinColumn(name: 'ID_MAGASIN', referencedColumnName: 'ID')]
    #[ORM\ManyToOne(targetEntity: 'Magasin')]
    private $idMagasin;

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

    public function getIdMagasin(): ?Magasin
    {
        return $this->idMagasin;
    }

    public function setIdMagasin(?Magasin $idMagasin): self
    {
        $this->idMagasin = $idMagasin;
        return $this;
    }
}
