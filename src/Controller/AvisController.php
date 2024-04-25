<?php

namespace App\Controller;

use App\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * Affiche la liste de toutes les avis
     * @Route("/reviews", name="review_index")
     */
    public function index(): Response
    {
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
        ]);
    }

     /**
     * Affiche le détail d'une review
     * @Route("/review/{review}", name="review_show", methods={"GET"})
     * @param Review $review
     */
    public function show(Avis $avis)
    {
    }

    /**
     * Traite la requête d'un formulaire de création de review
     * @Route("/review", name="review_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche le formulaire d'édition d'une review (GET)
     * Traite le formulaire d'édition d'une review (POST)
     * @Route("/review/{review}/edit", name="review_edit", methods={"GET", "POST"})
     * @param Avis $avis
     */
    public function edit(Avis $avis)
    {
    }

    /**
     * Supprime une review
     * @Route("/review/{review}", name="review_delete", methods={"DELETE"})
     * @param Review $review
     */
    public function delete(Avis $avis)
    {
    }
}
