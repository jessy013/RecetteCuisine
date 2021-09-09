<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resume;



    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="RecetteId")
     */
    private $Operation;

    /**
     * @ORM\OneToMany(targetEntity=RecetteIngredient::class, mappedBy="recette", orphanRemoval=true)
     */
    private $ingredients;

    public function __construct()
    {
        $this->Operation = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
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

    public function getResume(): ?int
    {
        return $this->resume;
    }

    public function setResume(int $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperation(): Collection
    {
        return $this->Operation;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->Operation->contains($operation)) {
            $this->Operation[] = $operation;
            $operation->setRecetteId($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->Operation->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getRecetteId() === $this) {
                $operation->setRecetteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RecetteIngredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(RecetteIngredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setRecette($this);
        }

        return $this;
    }

    public function removeIngredient(RecetteIngredient $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecette() === $this) {
                $ingredient->setRecette(null);
            }
        }

        return $this;
    }
}
