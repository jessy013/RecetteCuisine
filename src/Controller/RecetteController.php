<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use App\Repository\RecetteRepository;

class RecetteController extends AbstractController
{
    /**
     * @Route("/", name="recette")
     */
    public function index(): Response
    {
        return $this->render('recette/index.html.twig', [
            'controller_name' => 'RecetteController',
        ]);
        }
        /**
        * @Route("/api/recette", name="api_recette")
        */
        public function getAll(RecetteRepository $recetteRepository): Response
        {
        $recette = $recetteRepository->findAll();
        $json = json_encode($recette);
        $reponse = new Response($json, 200, [
        'content-type' => 'application/json'
        ]);
        return $reponse;
    }
    /**
        * @Route("/api/recette/{id}", name="api_recette_byid")
        */
        public function GetOneBy(RecetteRepository $recetteRepository,$id): Response
        {
        $recette = $recetteRepository->find($id);
        $json = json_encode($recette);
        $reponse = new Response($json, 200, [
        'content-type' => 'application/json'
        ]);
        return $reponse;
    }
}
