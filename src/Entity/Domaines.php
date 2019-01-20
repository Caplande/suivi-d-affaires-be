<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomainesRepository")
 */
class Domaines
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
    private $domaine;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sujets", mappedBy="domaine")
     */
    private $sujets;

    public function __construct()
    {
        $this->sujets = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    public function getId()
    {
        return $this->id;
    }

    public function getDomaine(): string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

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
            $sujet->setDomaine($this);
        }

        return $this;
    }

    public function removeSujet(Sujets $sujet): self
    {
        if ($this->sujets->contains($sujet)) {
            $this->sujets->removeElement($sujet);
            // set the owning side to null (unless already changed)
            if ($sujet->getDomaine() === $this) {
                $sujet->setDomaine(null);
            }
        }

        return $this;
    }
}
