<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HouseHasCharacters
 *
 * @ORM\Table(name="house_has_characters", indexes={@ORM\Index(name="house_has_characters_character_foreign", columns={"character"}), @ORM\Index(name="house_has_characters_house_foreign", columns={"house"})})
 * @ORM\Entity
 */
class HouseHasCharacters
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
     * @var \House
     *
     * @ORM\ManyToOne(targetEntity="House")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="house", referencedColumnName="id")
     * })
     */
    private $house;

    /**
     * @var \Character
     *
     * @ORM\ManyToOne(targetEntity="Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="character", referencedColumnName="id")
     * })
     */
    private $character;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): self
    {
        $this->character = $character;

        return $this;
    }


}
