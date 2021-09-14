<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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
        $normalized = $normalizer->normalize($recette,null,['groups'=>'Recette:read']);
        $json = json_encode($normalized);
        $reponse = new Response($json, 200, [
        'content-type' => 'application/json'
        ]);
        return $reponse;
    }

    /**
    * @Route("/api/recette", name="api_recette" , methods="GET")
    */
    public function find(recetteRepository $recetteRepository
    ,NormalizerInterface $normalizer): Response
    {
    $recettes = $recetteRepository->findAll();
    $normalized = $normalizer->normalize($recettes,null,['groups'=>'Recette:read']);
    $json = json_encode($normalized);
    $reponse = new Response($json, 200, [
    'content-type' => 'application/json'
    ]);
    return $reponse;
    }
}
