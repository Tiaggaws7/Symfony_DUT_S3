<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProstagesController extends AbstractController
{

    public function index(): Response
    {

        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }


    //ENTREPRISES


    public function listeEntreprises(): Response
    {
        $entreprisesRepository = $this->getDoctrine()->getRepository(Entreprise::class);

        $entreprises = $entreprisesRepository->findAll();


        return $this->render('prostages/entreprise/listeEntreprises.html.twig', ['entreprises' => $entreprises]);
    }

    public function detailEntreprise($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $entreprisesRepository = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer le stage qui correspond à l'id
        $entreprise = $entreprisesRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/entreprise/detailEntreprise.html.twig', ['entreprise' => $entreprise]);
    }

    public function stagesParEntreprise($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $entreprisesRepository = $this->getDoctrine()->getRepository(Entreprise::class);
        // Récupérer le stage qui correspond à l'id
        $entreprise = $entreprisesRepository->find($id);

        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);
        $stages = $stagesRepository->findAll();

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/entreprise/stagesParEntreprise.html.twig', ['entreprise' => $entreprise, 'stages' => $stages]);
    }



    //FORMATIONS


    public function listeFormations(): Response
    {
        $formationsRepository = $this->getDoctrine()->getRepository(Formation::class);

        $formations = $formationsRepository->findAll();

        return $this->render('prostages/formation/listeFormations.html.twig', ['formations' => $formations]);
    }

    public function detailFormation($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $formationsRepository = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer le stage qui correspond à l'id
        $formation = $formationsRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/formation/detailFormation.html.twig', ['formation' => $formation]);
    }

    public function stagesParFormation($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);
        // Récupérer le stage qui correspond à l'id
        $stages = $stagesRepository->findAll();

        $formationsRepository = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $formationsRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/formation/stagesParFormation.html.twig', [ 'stages' => $stages, 'formation' => $formation]);
    }

    //STAGES


    public function listeStages(): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD

        $stages = $stagesRepository->findAll();

        // Envoyer les données récupérés à la vue chargée de les afficher
        return $this->render('prostages/stage/listeStages.html.twig', ['stages' => $stages]);
    }

    public function detailStage($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer le stage qui correspond à l'id
        $stage = $stagesRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/stage/detailStage.html.twig', ['stage' => $stage]);
    }

    public function formationsParStage($id): Response
    {
        // Récupérer le repository de l'entité Stage
        $stagesRepository = $this->getDoctrine()->getRepository(Stage::class);
        // Récupérer le stage qui correspond à l'id
        $stage = $stagesRepository->find($id);

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/stage/formationsParStage.html.twig', [ 'stage' => $stage]);
    }
}
