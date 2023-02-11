<?php

namespace App\Entity;

use App\Entity\House;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Character
 *
 * @ORM\Table(name="`character`", indexes={@ORM\Index(name="character_id_title_foreign", columns={"id_title"}), @ORM\Index(name="character_mother_id_foreign", columns={"mother_id"}), @ORM\Index(name="character_father_id_foreign", columns={"father_id"})})
 * @ORM\Entity
 */
class Character
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
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", length=65535, nullable=false)
     */
    private $biography;

    /**
     * @var \Title
     *
     * @ORM\ManyToOne(targetEntity="Title")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_title", referencedColumnName="id")
     * })
     */
    private $idTitle;

    /**
     * @var \Character
     *
     * @ORM\ManyToOne(targetEntity="Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mother_id", referencedColumnName="id")
     * })
     */
    private $mother;

    /**
     * @var \Character
     *
     * @ORM\ManyToOne(targetEntity="Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="father_id", referencedColumnName="id")
     * })
     */
    private $father;


 /**
     * @ORM\ManyToMany(targetEntity="House")
     * 
     * )
     */ 
    protected $houses;
  
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getIdTitle(): ?Title
    {
        return $this->idTitle;
    }

    public function setIdTitle(?Title $idTitle): self
    {
        $this->idTitle = $idTitle;

        return $this;
    }

    public function getMother(): ?self
    {
        return $this->mother;
    }

    public function setMother(?self $mother): self
    {
        $this->mother = $mother;

        return $this;
    }

    public function getFather(): ?self
    {
        return $this->father;
    }

    public function setFather(?self $father): self
    {
        $this->father = $father;

        return $this;
    }
    public function setHouses(?self $houses): self
    {
        $this->houses = $houses;

        return $this;
    }

    /**
     * @return Collection<int, House>
     */
    public function getHouses(): Collection
    {
        return $this->houses;
    }

    public function addHouse(House $house): self
    {
        if (!$this->houses->contains($house)) {
            $this->houses[] = $house;
            $house->addCharacter($this);
        }

        return $this;
    }

    public function removeHouse(House $house): self
    {
        if ($this->houses->removeElement($house)) {
            $house->removeCharacter($this);
        }

        return $this;
    }
}
