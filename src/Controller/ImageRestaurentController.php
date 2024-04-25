<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageRestaurentController extends AbstractController
{
    /**
     * @Route("/image/restaurent", name="app_image_restaurent")
     */
    public function index(): Response
    {
        return $this->render('image_restaurent/index.html.twig', [
            'controller_name' => 'ImageRestaurentController',
        ]);
    }
}
