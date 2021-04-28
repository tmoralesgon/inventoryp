<?php

namespace App\Entity;

use App\Repository\InvTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvTypeRepository::class)
 */
class InvType
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=InvInventory::class, mappedBy="type")
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $invInventory->setType($this);
        }

        return $this;
    }

    public function removeInvInventory(InvInventory $invInventory): self
    {
        if ($this->invInventories->removeElement($invInventory)) {
            // set the owning side to null (unless already changed)
            if ($invInventory->getType() === $this) {
                $invInventory->setType(null);
            }
        }

        return $this;
    }
}
