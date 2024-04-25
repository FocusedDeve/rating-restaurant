<?php

namespace App\Entity;

use App\Repository\RestaurentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestaurentRepository::class)
 */
class Restaurent
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="restaurents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=ImageRestaurent::class, mappedBy="restaurent", orphanRemoval=true)
     */
    private $imagesRestaurent;

    public function __construct()
    {
        $this->imagesRestaurent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, ImageRestaurent>
     */
    public function getImagesRestaurent(): Collection
    {
        return $this->imagesRestaurent;
    }

    public function addImagesRestaurent(ImageRestaurent $imagesRestaurent): self
    {
        if (!$this->imagesRestaurent->contains($imagesRestaurent)) {
            $this->imagesRestaurent[] = $imagesRestaurent;
            $imagesRestaurent->setRestaurent($this);
        }

        return $this;
    }

    public function removeImagesRestaurent(ImageRestaurent $imagesRestaurent): self
    {
        if ($this->imagesRestaurent->removeElement($imagesRestaurent)) {
            // set the owning side to null (unless already changed)
            if ($imagesRestaurent->getRestaurent() === $this) {
                $imagesRestaurent->setRestaurent(null);
            }
        }

        return $this;
    }
}
