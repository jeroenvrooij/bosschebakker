<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /** @var \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $plainPassword = 'makker';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setEmail('jeroen@demakker.nl')
            ->setPassword($encoded)
            ->setIsActive(true)
        ;
        $manager->persist($user);

        $manager->flush();
    }

}