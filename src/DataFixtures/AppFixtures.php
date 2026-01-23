<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Habitats
        $savane = new Habitat();
        $savane->setNom('Savane');
        $savane->setDescription('Un vaste espace ouvert recréant les plaines africaines. Découvrez les lions, girafes et éléphants dans leur environnement naturel.');
        $savane->setImages('img/savane.webp');
        $manager->persist($savane);

        $jungle = new Habitat();
        $jungle->setNom('Jungle');
        $jungle->setDescription('Une forêt tropicale dense abritant une biodiversité exceptionnelle. Singes, oiseaux exotiques et reptiles vous attendent.');
        $jungle->setImages('img/jungle-landscape.webp');
        $manager->persist($jungle);

        $marais = new Habitat();
        $marais->setNom('Marais');
        $marais->setDescription('Un écosystème humide unique peuplé de crocodiles, flamants roses et nombreuses espèces aquatiques.');
        $marais->setImages('img/marais-landscape.webp');
        $manager->persist($marais);

        // Animaux - Savane
        $lion = new Animal();
        $lion->setPrenom('Simba');
        $lion->setRace('Lion');
        $lion->setImages('img/lion.webp');
        $lion->setHabitat($savane);
        $manager->persist($lion);

        $girafe = new Animal();
        $girafe->setPrenom('Melman');
        $girafe->setRace('Girafe');
        $girafe->setImages('img/pexels-frans-van-heerden-201846-802112.webp');
        $girafe->setHabitat($savane);
        $manager->persist($girafe);

        $elephant = new Animal();
        $elephant->setPrenom('Dumbo');
        $elephant->setRace('Éléphant');
        $elephant->setImages('img/pexels-magda-ehlers-pexels-6808703.webp');
        $elephant->setHabitat($savane);
        $manager->persist($elephant);

        // Animaux - Jungle
        $singe = new Animal();
        $singe->setPrenom('Rafiki');
        $singe->setRace('Chimpanzé');
        $singe->setImages('img/pexels-inspiredimages-133394.webp');
        $singe->setHabitat($jungle);
        $manager->persist($singe);

        $toucan = new Animal();
        $toucan->setPrenom('Zazu');
        $toucan->setRace('Toucan');
        $toucan->setImages('img/pexels-yiyang-31939152.webp');
        $toucan->setHabitat($jungle);
        $manager->persist($toucan);

        // Animaux - Marais
        $crocodile = new Animal();
        $crocodile->setPrenom('Tick-Tock');
        $crocodile->setRace('Crocodile');
        $crocodile->setImages('img/pexels-yiyang-31939153.webp');
        $crocodile->setHabitat($marais);
        $manager->persist($crocodile);

        $flamant = new Animal();
        $flamant->setPrenom('Rosalie');
        $flamant->setRace('Flamant rose');
        $flamant->setImages('img/pexels-yiyang-31939156.webp');
        $flamant->setHabitat($marais);
        $manager->persist($flamant);

        // Services
        $restaurant = new Service();
        $restaurant->setNom('Restauration');
        $restaurant->setDescription('Savourez nos plats locaux et biologiques dans notre restaurant avec vue sur les habitats. Menu enfant disponible.');
        $manager->persist($restaurant);

        $boutique = new Service();
        $boutique->setNom('Boutique');
        $boutique->setDescription('Ramenez un souvenir de votre visite ! Peluches, livres, vêtements et articles éco-responsables.');
        $manager->persist($boutique);

        $visite = new Service();
        $visite->setNom('Visite guidée');
        $visite->setDescription('Découvrez le zoo accompagné de nos guides experts. Apprenez tout sur nos animaux et nos actions de conservation.');
        $manager->persist($visite);

        $petitTrain = new Service();
        $petitTrain->setNom('Petit train');
        $petitTrain->setDescription('Parcourez le zoo confortablement installé dans notre petit train. Idéal pour les familles et les personnes à mobilité réduite.');
        $manager->persist($petitTrain);

        $manager->flush();
    }
}
