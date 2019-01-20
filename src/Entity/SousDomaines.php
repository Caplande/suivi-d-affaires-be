<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SousDomainesRepository")
 */
class SousDomaines
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sousDomaine;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sujets", mappedBy="sousDomaine")
     */
    private $sujets;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    public function __construct()
    {
        $this->sujets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSousDomaine(): string
    {
        return $this->sousDomaine;
    }

    public function setSousDomaine(string $sousDomaine): self
    {
        $this->sousDomaine = $sousDomaine;

        return $this;
    }

    public function getImportance(): string
    {
        return $this->importance;
    }

    public function setImportance(string $importance): self
    {
        $this->importance = $importance;

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
            $sujet->setSousDomaine($this);
        }

        return $this;
    }

    public function removeSujet(Sujets $sujet): self
    {
        if ($this->sujets->contains($sujet)) {
            $this->sujets->removeElement($sujet);
            // set the owning side to null (unless already changed)
            if ($sujet->getSousDomaine() === $this) {
                $sujet->setSousDomaine(null);
            }
        }

        return $this;
    }
}
