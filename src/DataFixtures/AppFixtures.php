<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();

        //Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');
        
        
        //Pour la génératoin des données des formations
        $nomComplet = array("DUT Informatique", "DUT Génie Industriel et Maintenance", "DUT Technique de Commercialisation", "DUT réseaux et télécommunications", "DUT statistique et informatique décisionnelle", "LP Programmation Avancé");
        $nomRaccourci = array("DUT Info", "DUT GIM","DUT TC", "DUT R&T", "DUT STID", "LP Prog");

        // Pour la génération de données des entrprises
        $nomEntreprises = array("Google", "Apple", "Meta", "Amazon", "Microsoft", "SevenUP", "Dell", "Epson", "Buil Corporation", "Neuralink");
        $differenteActivite = array("informatique", "agro-alimentaire", "pharmaceutique", "Telecommunication", "service", "jardinage");

        // Pour la génération de données des stages
        $titresStages = array("conception de site web", "réalisation d'une super application", "construction d'une éolienne", "réparation d'un bateau à moteur", "réalisation de fontions");

        for ($i=0; $i < 5; $i++) { 
            $fixturesStage = new Stage();
            $fixturesStage->setTitre($titresStages[$i]);
            $fixturesStage->setMission($faker->realText($maxNbChars = 100, $indexSize = 2));
            $fixturesStage->setEmail($faker->freeEmail);
    
            $manager->persist($fixturesStage);
        }

        for ($i=0; $i < 5; $i++) { 
            $fixturesEntreprises = new Entreprise();
            $fixturesEntreprises->setNom($nomEntreprises[$faker->numberBetween($min = 0, $max = 9)]);
            $fixturesEntreprises->setAdresse($faker->address);
            $fixturesEntreprises->setActivite($differenteActivite[$faker->numberBetween($min = 0, $max = 9)]);
            $fixturesEntreprises->setSiteWeb($faker->domainName);

            $manager-> persist($fixturesEntreprises);

        }




        $manager->flush();
    }
}
