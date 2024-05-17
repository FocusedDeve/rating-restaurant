<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use App\Repository\RestaurentRepository;
use App\Repository\AvisRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AvisFixtures extends Fixture implements DependentFixtureInterface
{
    private $restaurentRepository;
    private $avisRepository;

    public function __construct(RestaurentRepository $restaurentRepository, AvisRepository $avisRepository) {
        $this->restaurentRepository = $restaurentRepository;
        $this->avisRepository = $avisRepository;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        /**
         * On créée 7000 reviews initiales
         */
        for ($i=0; $i<7000; $i++) {
            $avis = new Avis();
            $avis->setMessage( $faker->text(800) );
            $avis->setRating( rand(0,5) );
            $avis->setRestaurent( $this->restaurentRepository->find(rand(1, 1000)) );
            $manager->persist($avis);
        }

        /**
         * On les enregistre en DB
         */
        $manager->flush();


        /**
         * On créée 3000 reviews enfants (dont le parent est une des review initiales)
         */
        for ($i=0; $i<3000; $i++) {
            $avis = new Avis();
            $avis->setMessage( $faker->text(800) );
            $avis->setRating( rand(0,5) );
            $avis->setParent( $this->avisRepository->find(rand(1, 7000)) ); // On cherche un ID entre 1 et 7000 (un commentaire initial)
            $avis->setRestaurent( $avis>getParent()->getRestaurent() ); // On récupère le restaurant de la review parente
            $manager->persist($avis);

        }

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