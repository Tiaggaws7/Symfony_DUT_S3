<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $mission;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="stage")
     */
    private $stages;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="stage")
     */
    private $stagesFormation;

    public function __construct()
    {
        $this->stagesFormation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStages(): ?Entreprise
    {
        return $this->stages;
    }

    public function setStages(?Entreprise $stages): self
    {
        $this->stages = $stages;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getStagesFormation(): Collection
    {
        return $this->stagesFormation;
    }

    public function addStagesFormation(Formation $stagesFormation): self
    {
        if (!$this->stagesFormation->contains($stagesFormation)) {
            $this->stagesFormation[] = $stagesFormation;
            $stagesFormation->addStage($this);
        }

        return $this;
    }

    public function removeStagesFormation(Formation $stagesFormation): self
    {
        if ($this->stagesFormation->removeElement($stagesFormation)) {
            $stagesFormation->removeStage($this);
        }

        return $this;
    }
}
