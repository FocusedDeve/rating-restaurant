<?php

namespace App\Controller;

use App\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * Affiche la liste de toutes les avis
     * @Route("/aviss", name="avis_index")
     */
    public function index(): Response
    {
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
        ]);
    }

     /**
     * Affiche le détail d'une avis
     * @Route("/avis/{avis}", name="avis_show", methods={"GET"}, requirements={"avis"="\d+"})
     * @param Avis $avis
     */
    public function show(Avis $avis)
    {
    }

    /**
     * Traite la requête d'un formulaire de création de avis
     * @Route("/avis", name="avis_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche le formulaire d'édition d'une avis (GET)
     * Traite le formulaire d'édition d'une avis (POST)
     * @Route("/avis/{avis}/edit", name="avis_edit", methods={"GET", "POST"})
     * @param Avis $avis
     */
    public function edit(Avis $avis)
    {
    }

    /**
     * Supprime une avis
     * @Route("/avis/{avis}", name="avis_delete", methods={"DELETE"})
     * @param Avis $avis
     */
    public function delete(Avis $avis)
    {
    }  
}
