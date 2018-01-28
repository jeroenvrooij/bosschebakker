<?php

namespace App\DataFixtures;

use App\Entity\Bread;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BreadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bread = new Bread();
        $bread->setName("7 Granen - OUD");
        $bread->setBakingDay(new \DateTime("- 4 days"));
        $bread->setQuantity(4);
        $manager->persist($bread);

        $bread = new Bread();
        $bread->setName("7 Granen");
        $bread->setBakingDay(new \DateTime("+ 2 days"));
        $bread->setQuantity(4);
        $manager->persist($bread);

        $manager->flush();
    }

}