<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VersionsRepository")
 */
class Versions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $porteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $delai;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avancement;

    /**
     * @ORM\Column(type="integer")
     */
    private $rang;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sujets", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sujet;

    public function getId()
    {
        return $this->id;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getPorteur(): string
    {
        return $this->porteur;
    }

    public function setPorteur(string $porteur): self
    {
        $this->porteur = $porteur;

        return $this;
    }

    public function getDelai(): string
    {
        return $this->delai;
    }

    public function setDelai(string $delai): self
    {
        $this->delai = $delai;

        return $this;
    }

    public function getAvancement(): string
    {
        return $this->avancement;
    }

    public function setAvancement(string $avancement): self
    {
        $this->avancement = $avancement;

        return $this;
    }

    public function getRang()
    {
        return $this->rang;
    }

    public function setRang(integer $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getSujet(): Sujets
    {
        return $this->sujet;
    }

    public function setSujet(Sujets $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }
}
