<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
    private $codePostal;

    /**
     * @ORM\OneToMany(targetEntity=Restaurent::class, mappedBy="city", orphanRemoval=true)
     */
    private $restaurents;

    public function __construct()
    {
        $this->restaurents = new ArrayCollection();
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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Restaurent>
     */
    public function getRestaurents(): Collection
    {
        return $this->restaurents;
    }

    public function addRestaurent(Restaurent $restaurent): self
    {
        if (!$this->restaurents->contains($restaurent)) {
            $this->restaurents[] = $restaurent;
            $restaurent->setCity($this);
        }

        return $this;
    }

    public function removeRestaurent(Restaurent $restaurent): self
    {
        if ($this->restaurents->removeElement($restaurent)) {
            // set the owning side to null (unless already changed)
            if ($restaurent->getCity() === $this) {
                $restaurent->setCity(null);
            }
        }

        return $this;
    }
}
