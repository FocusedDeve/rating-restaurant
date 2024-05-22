<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Restaurent;
use App\Entity\Avis;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET"})
     */
    public function index()
    {

        $tenBestrestaurentsId = $this->getDoctrine()->getRepository(Avis::class)->findBestTenRatings();

        $tenBestrestaurents = array_map(function($data) {
            return $this->getDoctrine()->getRepository(Restaurent::class)->find($data['restaurentId']);
        }, $tenBestrestaurentsId);

        return $this->render('app/index.html.twig', [
             'restaurents' => $tenBestrestaurents,
        ]);
    }
    
    /**
     * @Route("/search", name="app_search", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function search(Request $request, PaginatorInterface $paginator) {

        // On récupère l'input de recherche du formulaire, le name=codePostal
        $searchcodePostal = $request->query->get('codePostal');


        // On recherche une ville par son code postal
        $city = $this->getDoctrine()->getRepository(City::class)->findOneBy(["codePostal" => $searchcodePostal]);


        // Si une ville est trouvée
        if ($city) {

            $data = $city->getrestaurents();

            $restaurents = $paginator->paginate(
                $data,
                $request->query->getInt('page', 1),
                50
            );

            return $this->render('restaurent/index.html.twig', [
                'restaurents' => $restaurents,
            ]);
        }

        // Sinon, on redirige en page d'accueil

        return $this->redirectToRoute("app_index");

    }
}