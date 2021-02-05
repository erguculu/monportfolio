<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    // Create a fictiv user for to access the user interface
    public function load(ObjectManager $manager)
    {
         $admin = new user();
         $admin->setEmail('admin@admin.com');
         $admin->setRoles(['ROLE_ADMIN']);
         $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));
                  //Add a user in the database
         $manager->persist($admin);
         $manager->flush();
    }
}
