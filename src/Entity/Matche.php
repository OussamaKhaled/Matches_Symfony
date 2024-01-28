<?php

namespace App\Entity;

use App\Repository\MatcheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatcheRepository::class)]
class Matche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $numeroMatche = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateM = null;

    #[ORM\Column]
    private ?int $nbSpectateurs = null;

    #[ORM\ManyToOne(inversedBy: 'matches')]
    private ?Stade $stade = null;

    public function getNumeroMatche(): ?int
    {
        return $this->numeroMatche;
    }
    public function setNumeroMatche(int $numeroMatche): self
    {
        $this->numeroMatche = $numeroMatche;

        return $this;
    }

    public function getDateM(): ?\DateTimeInterface
    {
        return $this->dateM;
    }

    public function setDateM(\DateTimeInterface $dateM): self
    {
        $this->dateM = $dateM;

        return $this;
    }

    public function getNbSpectateurs(): ?int
    {
        return $this->nbSpectateurs;
    }

    public function setNbSpectateurs(int $nbSpectateurs): self
    {
        $this->nbSpectateurs = $nbSpectateurs;

        return $this;
    }

    public function getStade(): ?Stade
    {
        return $this->stade;
    }

    public function setStade(?Stade $stade): self
    {
        $this->stade = $stade;

        return $this;
    }
}
