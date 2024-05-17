<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use App\Repository\RestaurentRepository;
use App\Repository\AvisRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AvisFixtures extends Fixture implements DependentFixtureInterface
{
    private $restaurentRepository;
    private $reviewRepository;

    public function __construct(RestaurentRepository $restaurentRepository, AvisRepository $reviewRepository) {
        $this->restaurentRepository = $restaurentRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        /**
         * On créée 7000 reviews initiales
         */
        for ($i=0; $i<7000; $i++) {
            $review = new Avis();
            $review->setMessage( $faker->text(800) );
            $review->setRating( rand(0,5) );
            $review->setRestaurent( $this->restaurentRepository->find(rand(1, 1000)) );
            $manager->persist($review);
        }

        /**
         * On les enregistre en DB
         */
        $manager->flush();


        /**
         * On créée 3000 reviews enfants (dont le parent est une des review initiales)
         */
        for ($i=0; $i<3000; $i++) {
            $review = new Avis();
            $review->setMessage( $faker->text(800) );
            $review->setRating( rand(0,5) );
            $review->setParent( $this->reviewRepository->find(rand(1, 7000)) ); // On cherche un ID entre 1 et 7000 (un commentaire initial)
            $review->setRestaurent( $review->getParent()->getRestaurent() ); // On récupère le restaurant de la review parente
            $manager->persist($review);

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