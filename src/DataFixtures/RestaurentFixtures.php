<?php

namespace App\DataFixtures;

use App\Entity\Restaurent;
use App\Repository\CityRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
//use Doctrine\persistence\src\Persistence\ObjectManager;

use Faker\Factory;

class RestaurentFixtures extends Fixture implements DependentFixtureInterface
{
    private $cityRepository;

    public  function __construct(CityRepository $cityRepository) {
        $this->cityRepository = $cityRepository;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i=0; $i < 1000; $i++) {

            $restaurent = new Restaurent();
            $restaurent->setName( $faker->company );
            $restaurent->setDescription( $faker->text(500) );
            $restaurent->setCity( $this->cityRepository->find( rand(1, 1000) ) );

            $manager->persist($restaurent);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CityFixtures::class,
        );
    }
}