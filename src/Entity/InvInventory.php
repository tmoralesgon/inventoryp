<?php

namespace App\Entity;

use App\Repository\InvInventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvInventoryRepository::class)
 */
class InvInventory
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=InvUser::class, inversedBy="invInventories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=InvType::class, inversedBy="invInventories")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=InvItem::class, mappedBy="inventory")
     */
    private $invItems;

    public function __construct()
    {
        $this->invItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getUser(): ?InvUser
    {
        return $this->user;
    }

    public function setUser(?InvUser $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?InvType
    {
        return $this->type;
    }

    public function setType(?InvType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|InvItem[]
     */
    public function getInvItems(): Collection
    {
        return $this->invItem;
    }

    public function addInvItem(InvItem $invItem): self
    {
        if (!$this->invItems->contains($invItem)) {
            $this->invItems[] = $invItem;
            $invItem->addInventory($this);
        }

        return $this;
    }

    public function removeInvItem(InvItem $invItem): self
    {
        if ($this->invItems->removeElement($invItem)) {
            $invItem->removeInventory($this);
        }

        return $this;
    }
}
