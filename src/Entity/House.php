<?php

namespace App\Entity;

use App\Entity\Character;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * House
 *
 * @ORM\Table(name="house")
 * @ORM\Entity
 */
class House
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="colour", type="string", length=255, nullable=false)
     */
    private $colour;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="houses")
     * @ORM\JoinTable(name="house_character")
     *  @ORM\JoinColumn(name="character", referencedColumnName="id")
     * 
     */
    private $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    // /**
    //  * @ORM\ManyToMany(targetEntity=Character::class)
    //  * @ORM\JoinTable(name="house_has_characters")
    //  */
    // private $characters;

    // public function __construct()
    // {
    //     $this->characters = new ArrayCollection();
    // }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setHouse($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getHouse() === $this) {
                $character->setHouse(null);
            }
        }

        return $this;
    }
    /**
     * Set the value of characters
     *
     * @return  self
     */ 
    public function setCharacters($characters)
    {
        $this->characters = $characters;

        return $this;
    }
}
