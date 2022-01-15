<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\StageRepository;
use App\Repository\FormationRepository;

class ProstagesController extends AbstractController
{

    public function index(): Response
    {

        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }


    //ENTREPRISES


    public function listeEntreprises(EntrepriseRepository $entreprisesRepository): Response
    {
        $entreprises = $entreprisesRepository->findAll();


        return $this->render('prostages/entreprise/listeEntreprises.html.twig', ['entreprises' => $entreprises]);
    }

    public function detailEntreprise(Entrepri): Response
    {
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


    public function listeFormations(FormationRepository $formationsRepository): Response
    {
        $formations = $formationsRepository->findAll();

        return $this->render('prostages/formation/listeFormations.html.twig', ['formations' => $formations]);
    }

    public function detailFormation(Formation $formation): Response
    {
        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/formation/detailFormation.html.twig', ['formation' => $formation]);
    }

    public function stagesParFormation(StageRepository $stagesRepository, Formation $formation): Response
    {
        // Récupérer le stage qui correspond à l'id
        $stages = $stagesRepository->findAll();

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/formation/stagesParFormation.html.twig', [ 'stages' => $stages, 'formation' => $formation]);
    }

    //STAGES


    public function listeStages(StageRepository $stagesRepository): Response
    {
        // Récupérer les stages enregistrés en BD

        $stages = $stagesRepository->findAll();

        // Envoyer les données récupérés à la vue chargée de les afficher
        return $this->render('prostages/stage/listeStages.html.twig', ['stages' => $stages]);
    }

    public function detailStage(Stage $stage): Response
    {

        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/stage/detailStage.html.twig', ['stage' => $stage]);
    }

    public function formationsParStage(Stage $stage): Response
    {
        // Envoyer les données du stage récupéré à la vue chargée de l'afficher
        return $this->render('prostages/stage/formationsParStage.html.twig', [ 'stage' => $stage]);
    }
}
