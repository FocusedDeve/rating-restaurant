<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\Common\Persistence\ObjectManager; // Utilisez l'ancien namespace
use Doctrine\Persistence\ObjectManager; // Utilisez le nouveau namespace

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
