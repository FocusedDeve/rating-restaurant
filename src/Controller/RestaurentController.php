<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurentController extends AbstractController
{
    /**
     * @Route("/restaurent", name="app_restaurent")
     */
    public function index(): Response
    {
        return $this->render('restaurent/index.html.twig', [
            'controller_name' => 'RestaurentController',
        ]);
    }
}
