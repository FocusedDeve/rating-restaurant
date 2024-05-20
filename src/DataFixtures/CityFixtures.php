<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\Common\Persistence\ObjectManager; // Utilisez l'ancien namespace
use Doctrine\Persistence\ObjectManager; // Utilisez le nouveau namespace
use Faker\Factory;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 1000; $i++) {
            $city = new City();
            $city->setName( $faker->city );
            $city->setCodePostal( $faker->postcode );

            $manager->persist($city);
        }

        $manager->flush();
    }
}