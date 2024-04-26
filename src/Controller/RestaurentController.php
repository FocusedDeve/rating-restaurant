<?php

namespace App\Controller;

use App\Entity\Restaurent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurentController extends AbstractController
{
    /**
     * Affiche la liste des restaurants
     * @Route("/restaurants", name="restaurant_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('restaurent/index.html.twig', [
            'controller_name' => 'RestaurentController',
        ]);
    }
    /**
     * Affiche un restaurant
     * @Route("/restaurant/{restaurant}", name="restaurant_show", methods={"GET"})
     * @param Restaurent $restaurent
     */
    public function show(Restaurent $restaurent)
    {
    }

    /**
     * Affiche le formulaire de création de restaurant
     * @Route("/restaurant/new", name="restaurant_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * Traite la requête d'un formulaire de création de restaurant
     * @Route("/restaurant", name="restaurant_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche le formulaire d'édition d'un restaurant (GET)
     * Traite le formulaire d'édition d'un restaurant (POST)
     * @Route("/restaurant/{restaurant}/edit", name="restaurant_edit", methods={"GET", "POST"})
     * @param Restaurent $restaurent
     */
    public function edit(Restaurent $restaurent)
    {
    }

    /**
     * Supprime un restaurant
     * @Route("/restaurant/{restaurant}", name="restaurant_delete", methods={"DELETE"})
     * @param Restaurent $restaurent
     */
    public function delete(Restaurent $restaurent)
    {
    }
}
