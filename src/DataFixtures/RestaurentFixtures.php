<?php

namespace App\DataFixtures;

use App\Entity\Restaurent;
use App\Repository\CityRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager; // Utilisez l'ancien namespace
use Doctrine\Persistence\ObjectManager; // Utilisez le nouveau namespace
use Faker\Factory;

class RestaurentFixtures extends Fixture implements DependentFixtureInterface
{
    private $cityRepository;
    private $userRepository;
    public  function __construct(CityRepository $cityRepository, 
    UserRepository $userRepository) {
        $this->cityRepository = $cityRepository;
        $this->userRepository = $userRepository;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i=0; $i < 1000; $i++) {

            $restaurent = new Restaurent();
            $restaurent->setName( $faker->company );
            $restaurent->setDescription( $faker->text(500) );
            $restaurent->setCity( $this->cityRepository->find( rand(1, 1000) ) );
            $restaurent->setUser( $this->userRepository->findOneBy(["email" => "restaurateur@notaresto.com"]) );
            $manager->persist($restaurent);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}