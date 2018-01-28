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
    private $quantity;

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
    public function getName(): string
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
    public function getBakingDay(): \DateTime
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
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return Bread
     */
    public function setQuantity(int $quantity): Bread
    {
        $this->quantity = $quantity;

        return $this;
    }
}
