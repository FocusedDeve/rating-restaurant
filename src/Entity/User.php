<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="users")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="user", orphanRemoval=true)
     */
    private $aviss;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Restaurent", mappedBy="user", orphanRemoval=true)
     */
    private $restaurents;

    public function __construct()
    {
        $this->aviss = new ArrayCollection();
        $this->restaurents = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->aviss;
    }

    public function addAvis(Avis $avis): self
    {
        if (!$this->aviss->contains($avis)) {
            $this->aviss[] = $avis;
            $avis->setUser($this);
        }

        return $this;
    }

    public function removeAvis(Avis $avis): self
    {
        if ($this->aviss->contains($avis)) {
            $this->aviss->removeElement($avis);
            // set the owning side to null (unless already changed)
            if ($avis->getUser() === $this) {
                $avis->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Restaurent[]
     */
    public function getRestaurents(): Collection
    {
        return $this->restaurents;
    }

    public function addRestaurent(Restaurent $restaurent): self
    {
        if (!$this->restaurents->contains($restaurent)) {
            $this->restaurents[] = $restaurent;
            $restaurent->setUser($this);
        }

        return $this;
    }

    public function removeRestaurent(Restaurent $restaurent): self
    {
        if ($this->restaurents->contains($restaurent)) {
            $this->restaurents->removeElement($restaurent);
            // set the owning side to null (unless already changed)
            if ($restaurent->getUser() === $this) {
                $restaurent->setUser(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->email; // ou toute autre propriété que vous souhaitez utiliser comme représentation en chaîne
    }
}