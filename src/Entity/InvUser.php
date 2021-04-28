<?php

namespace App\Entity;

use App\Repository\InvUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvUserRepository::class)
 */
class InvUser
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=InvInventory::class, mappedBy="user", orphanRemoval=true)
     */
    private $invInventories;

    public function __construct()
    {
        $this->invInventories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|InvInventory[]
     */
    public function getInvInventories(): Collection
    {
        return $this->invInventories;
    }

    public function addInvInventory(InvInventory $invInventory): self
    {
        if (!$this->invInventories->contains($invInventory)) {
            $this->invInventories[] = $invInventory;
            $invInventory->setUser($this);
        }

        return $this;
    }

    public function removeInvInventory(InvInventory $invInventory): self
    {
        if ($this->invInventories->removeElement($invInventory)) {
            // set the owning side to null (unless already changed)
            if ($invInventory->getUser() === $this) {
                $invInventory->setUser(null);
            }
        }

        return $this;
    }
}
