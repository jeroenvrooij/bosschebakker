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
        $bread->setName("Witje");
        $manager->persist($bread);

        $manager->flush();
    }

}