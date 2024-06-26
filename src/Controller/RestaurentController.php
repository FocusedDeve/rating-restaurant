<?php

namespace App\Controller;

use App\Entity\Restaurent;
use App\Form\RestaurentType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurentController extends AbstractController
{
    /**
     * Affiche la liste des restaurents
     * @Route("/restaurents", name="restaurent_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {

        $data = $this->getDoctrine()->getRepository(restaurent::class)->findAll();

        $restaurents = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            50
        );

        return $this->render('restaurent/index.html.twig', [
           'restaurents' => $restaurents,
        ]);
    }
    /**
     * Affiche un restaurent
    * @Route("/restaurent/{restaurent}", name="restaurent_show",
    *  methods={"GET"}, requirements={"restaurent"="\d+"})    
  * @param Restaurent $restaurent
   * @return Response
     */
    public function show(Restaurent $restaurent)
    {
        return $this->render('restaurent/show.html.twig', [
            'restaurent' => $restaurent
        ]);
    }

    /**
     * Affiche et gère le formulaire de création de restaurent
     * @Route("/restaurent/new", name="restaurent_new", methods={"GET", "POST"})
     */
    public function new(Request $request)
    {
        $restaurent = new restaurent();

        $form = $this->createForm(restaurentType::class, $restaurent);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurent = $form->getData();
            $restaurent->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restaurent);
            $entityManager->flush();

            return $this->redirectToRoute('restaurent_index');
        }

        return $this->render('restaurent/form.html.twig', [
            'form' => $form->createView()
        ]);    }

    /**
     * Traite la requête d'un formulaire de création de restaurent
     * @Route("/restaurent", name="restaurent_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche le formulaire d'édition d'un restaurent (GET)
     * Traite le formulaire d'édition d'un restaurent (POST)
     * @Route("/restaurent/{restaurent}/edit", name="restaurent_edit", methods={"GET", "POST"})
     * @param Restaurent $restaurent
     */
    public function edit(Restaurent $restaurent)
    {
    }

    /**
     * Supprime un restaurent
     * @Route("/restaurent/{restaurent}", name="restaurent_delete", methods={"DELETE"})
     * @param Restaurent $restaurent
     */
    public function delete(Restaurent $restaurent)
    {
    }
}
