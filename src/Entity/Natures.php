<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NaturesRepository")
 */
class Natures
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nature;

    /**
     * @ORM\Column(type="integer")
     */
    private $priorite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sujets", mappedBy="nature")
     */
    private $sujets;

    public function __construct()
    {
        $this->sujets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNature()
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getPriorite()
    {
        return $this->priorite;
    }

    public function setPriorite(string $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * @return Collection|Sujets[]
     */
    public function getSujets(): Collection
    {
        return $this->sujets;
    }

    public function addSujet(Sujets $sujet): self
    {
        if (!$this->sujets->contains($sujet)) {
            $this->sujets[] = $sujet;
            $sujet->setNature($this);
        }

        return $this;
    }

    public function removeSujet(Sujets $sujet): self
    {
        if ($this->sujets->contains($sujet)) {
            $this->sujets->removeElement($sujet);
            // set the owning side to null (unless already changed)
            if ($sujet->getNature() === $this) {
                $sujet->setNature(null);
            }
        }

        return $this;
    }
}
