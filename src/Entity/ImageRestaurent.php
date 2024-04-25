<?php

namespace App\Entity;

use App\Repository\ImageRestaurentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRestaurentRepository::class)
 */
class ImageRestaurent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurent::class, inversedBy="imagesRestaurent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurent(): ?Restaurent
    {
        return $this->restaurent;
    }

    public function setRestaurent(?Restaurent $restaurent): self
    {
        $this->restaurent = $restaurent;

        return $this;
    }
}
