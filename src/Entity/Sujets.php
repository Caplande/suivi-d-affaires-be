<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SujetsRepository")
 */
class Sujets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qui;

    /**
     * @ORM\Column(type="datetime")
     */
    private $inscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Natures", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Domaines", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $domaine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousDomaines", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousDomaine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Statuts", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Versions", mappedBy="sujet", cascade={"persist","remove"})
     */
    private $versions;

    public function __construct()
    {
        $this->versions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getObjet(): string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getQui(): string
    {
        return $this->qui;
    }

    public function setQui(string $qui): self
    {
        $this->qui = $qui;

        return $this;
    }

    public function getInscription(): \DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getNature()
    {
        return $this->nature;
    }

    public function setNature(Natures $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getDomaine()
    {
        return $this->domaine;
    }

    public function setDomaine(Domaines $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getSousDomaine()
    {
        return $this->sousDomaine;
    }

    public function setSousDomaine(SousDomaines $sousDomaine): self
    {
        $this->sousDomaine = $sousDomaine;

        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut(Statuts $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Versions[]
     */
    public function getVersions(): Collection
    {
        return $this->versions;
    }

    public function addVersion(Versions $version): self
    {
        if (!$this->versions->contains($version)) {
            $this->versions[] = $version;
            $version->setSujet($this);
        }

        return $this;
    }

    public function removeVersion(Versions $version): self
    {
        if ($this->versions->contains($version)) {
            $this->versions->removeElement($version);
            // set the owning side to null (unless already changed)
            if ($version->getSujet() === $this) {
                $version->setSujet(null);
            }
        }

        return $this;
    }
}
