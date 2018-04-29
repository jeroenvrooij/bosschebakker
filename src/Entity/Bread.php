<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BreadRepository")
 */
class Bread
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $bakingDay;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $initialQuantity;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $quantityLeft;

    /**
     * Reduce the quantity that is left after a bread has been ordered.
     */
    public function processOrder()
    {
        $this->quantityLeft -= 1;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Bread
     */
    public function setName(string $name): Bread
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBakingDay(): ?\DateTime
    {
        return $this->bakingDay;
    }

    /**
     * @param \DateTime $bakingDay
     *
     * @return Bread
     */
    public function setBakingDay(\DateTime $bakingDay): Bread
    {
        $this->bakingDay = $bakingDay;

        return $this;
    }

    /**
     * @return int
     */
    public function getInitialQuantity(): ?int
    {
        return $this->initialQuantity;
    }

    /**
     * @param int $initialQuantity
     *
     * @return Bread
     */
    public function setInitialQuantity(?int $initialQuantity): Bread
    {
        $this->initialQuantity = $initialQuantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityLeft(): ?int
    {
        return $this->quantityLeft;
    }

    /**
     * @param int $quantityLeft
     *
     * @return $this
     */
    public function setQuantityLeft(?int $quantityLeft): Bread
    {
        $this->quantityLeft = $quantityLeft;

        return $this;
    }
}
