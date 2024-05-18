<?php

namespace App\Controller;

use App\Entity\ImageRestaurent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImageRestaurentController extends AbstractController
{
   
    /**
     * @Route("/restaurants/pictures", name="restaurant_picture_index")
     */
    public function index(): Response
    {
        return $this->render('image_restaurent/index.html.twig', [
            'controller_name' => 'ImageRestaurentController',
        ]);
    }
    
    /**
     * Affiche le détail d'une picture
     * @Route("/picture/{picture}", name="picture_show", methods={"GET"}, requirements={"picture"="\d+"})     
     * @param ImageRestaurent $picture
     */
    public function show(ImageRestaurent $picture)
    {
    }

    /**
     * Traite la requête d'un formulaire de création de picture
     * @Route("/picture", name="picture_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche le formulaire d'édition d'une picture (GET)
     * Traite le formulaire d'édition d'une picture (POST)
     * @Route("/picture/{picture}/edit", name="picture_edit", methods={"GET", "POST"})
     * @param ImageRestaurent $picture
     */
    public function edit(ImageRestaurent $picture)
    {
    }

    /**
     * Supprime une picture
     * @Route("/picture/{picture}", name="picture_delete", methods={"DELETE"})
     * @param ImageRestaurent $picture
     */
    public function delete(ImageRestaurent $picture)
    {
    }
}
