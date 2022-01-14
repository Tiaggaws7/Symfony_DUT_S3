<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;

class ProstagesController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    public function entreprises(): Response
    {
        return $this->render('prostages/entreprises.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    public function formations(): Response
    {
        return $this->render('prostages/formations.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    public function listeStages(): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD

        $stages = $stagesRepository->findAll();

        // Envoyer les données récupérés à la vue chargée de les afficher
        return $this->render('prostages/listeStages.html.twig', ['stages' => $stages]);
    }

    public function detailStage($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer le stage qui correspond à l'id
        $stage = $stagesRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/detailStage.html.twig', ['stage' => $stage]);
    }
}
