<?php

namespace App\Controller;

use App\Entity\Restaurent;
use App\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET"})
     */
    public function index()
    {

        $tenBestRestaurantsId = $this->getDoctrine()->getRepository(Avis::class)->findBestTenRatings();

        $tenBestRestaurants = array_map(function($data) {
            return $this->getDoctrine()->getRepository(Restaurent::class)->find($data['restaurantId']);
        }, $tenBestRestaurantsId);

        return $this->render('app/index.html.twig', [
             'restaurants' => $tenBestRestaurants,
        ]);
    }
}