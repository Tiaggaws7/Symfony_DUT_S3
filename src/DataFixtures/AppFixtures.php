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

        for ($i=0; $i < 10; $i++) { 
            $fixturesStage = new Stage();
            $fixturesStage->setTitre($faker->realText($maxNbChars = 28, $indexSize = 2));
            $fixturesStage->setMission($faker->realText($maxNbChars = 100, $indexSize = 2));
            $fixturesStage->setEmail($faker->freeEmail);
    
            $manager->persist($fixturesStage);
        }


        $manager->flush();
    }
}
