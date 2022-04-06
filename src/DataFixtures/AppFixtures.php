<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected $faker;
    protected $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Admin admin');
        $user->setEmail('admin@gmail.com');
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                'test1234'
            )
        );
        $manager->persist($user);
        $user = new User();
        $user->setName('USER user');
        $user->setEmail('user@gmail.com');
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                'test1234'
            )
        );
        $manager->persist($user);
        $user = new User();
        $user->setName('SECRETARY secretary');
        $user->setEmail('secretary@gmail.com');
        $user->setRoles(["ROLE_SECRETARY"]);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                'test1234'
            )
        );
        $manager->persist($user);
        $manager->flush();
    }
}
