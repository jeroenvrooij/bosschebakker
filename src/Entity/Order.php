<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="`order`")
 */
class Order
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
     * @ORM\ManyToOne(targetEntity="Bread")
     *
     * @var \App\Entity\Bread
     */
    private $bread;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     *
     * @var \App\Entity\User
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $sliced = false;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTIme
     */
    private $orderedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \App\Entity\Bread
     */
    public function getBread()
    {
        return $this->bread;
    }

    /**
     * @param \App\Entity\Bread $bread
     *
     * @return $this
     */
    public function setBread(Bread $bread = null): Order
    {
        $this->bread = $bread;

        return $this;
    }

    /**
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \App\Entity\User $user
     *
     * @return $this
     */
    public function setUser(User $user = null): Order
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSliced()
    {
        return $this->sliced;
    }

    /**
     * @param bool $sliced
     *
     * @return $this
     */
    public function setSliced(bool $sliced  = false): Order
    {
        $this->sliced = $sliced;

        return $this;
    }

    /**
     * @return \DateTIme
     */
    public function getOrderedAt()
    {
        return $this->orderedAt;
    }

    /**
     * @param \DateTIme $orderedAt
     *
     * @return $this
     */
    public function setOrderedAt(\DateTIme $orderedAt = null): Order
    {
        $this->orderedAt = $orderedAt;

        return $this;
    }
}
