<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager; // Utilisez l'ancien namespace
use Doctrine\Persistence\ObjectManager; // Utilisez le nouveau namespaceuse Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ImageRestaurentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
{
    return array(
        RestaurentFixtures::class,
    );
}
}