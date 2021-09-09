<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class, inversedBy="Operation")
     */
    private $RecetteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecetteId(): ?Recette
    {
        return $this->RecetteId;
    }

    public function setRecetteId(?Recette $RecetteId): self
    {
        $this->RecetteId = $RecetteId;

        return $this;
    }
}
