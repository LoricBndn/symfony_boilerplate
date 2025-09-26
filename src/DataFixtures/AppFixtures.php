<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Garniture;
use App\Entity\Sauce;
use App\Entity\Viande;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // =====================
        // Pains
        // =====================
        $painsList = ['Classique', 'Complet', 'Sésame', 'Brioche', 'Wrap'];

        $pains = [];
        foreach ($painsList as $name) {
            $p = new Pain();
            $p->setName($name);
            $manager->persist($p);
            $pains[$name] = $p;
        }
        // =====================
        // Garnitures
        // =====================
        $garnituresList = ['Salade', 'Fromage', 'Oignon', 'Cornichon', 'Tomate', 'Oeuf', 'Bacon'];

        $garnitures = [];
        foreach ($garnituresList as $name) {
            $obj = new Garniture();
            $obj->setName($name);
            $manager->persist($obj);
            $garnitures[$name] = $obj;
        }

        // =====================
        // Viandes
        // =====================
        $viandesList = ['Boeuf', 'Poulet', 'Poisson', 'Veggie'];

        $viandes = [];
        foreach ($viandesList as $name) {
            $obj = new Viande();
            $obj->setName($name);
            $manager->persist($obj);
            $viandes[$name] = $obj;
        }

        // =====================
        // Sauces
        // =====================
        $saucesList = ['Ketchup', 'Mayonnaise', 'Barbecue', 'Blanche', 'Biggy', 'Andalouse', 'Moutarde'];

        $sauces = [];
        foreach ($saucesList as $name) {
            $s = new Sauce();
            $s->setName($name);
            $manager->persist($s);
            $sauces[$name] = $s;
        }


        // ----------------------------
        // Création des burgers
        // ----------------------------
        $burgersData = [
            ['name'=>'Big Mac','price'=>5.99,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Cornichon']],'sauces'=>[$sauces['Ketchup'],$sauces['Mayonnaise']]],
            ['name'=>'Chicken McNuggets','price'=>4.50,'pain'=>[],'viandes'=>[$viandes['Poulet']],'garnitures'=>[],'sauces'=>[]],
            ['name'=>'Veggie McPlant Nuggets','price'=>4.50,'pain'=>[],'viandes'=>[$viandes['Veggie']],'garnitures'=>[],'sauces'=>[]],
            ['name'=>'McVeggie','price'=>5.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Veggie']],'garnitures'=>[$garnitures['Salade']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McWrap Veggie','price'=>5.50,'pain'=>$pains['Wrap'],'viandes'=>[$viandes['Veggie']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Tomate']],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'Filet-O-Fish','price'=>5.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poisson']],'garnitures'=>[$garnitures['Fromage']],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'Filet-O-Fish Deluxe','price'=>6.00,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poisson']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Tomate']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McFish','price'=>4.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poisson']],'garnitures'=>[],'sauces'=>[$sauces['Ketchup']]],
            ['name'=>'McFish Mayo','price'=>4.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poisson']],'garnitures'=>[],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'P’tit Chicken','price'=>4.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Salade']],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'Croque McDo','price'=>4.00,'pain'=>$pains['Brioche'],'viandes'=>[],'garnitures'=>[$garnitures['Fromage']],'sauces'=>[]],
            ['name'=>'McChicken','price'=>5.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Salade']],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'Cheeseburger','price'=>4.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Cornichon']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Egg & Cheese McMuffin','price'=>4.50,'pain'=>$pains['Classique'],'viandes'=>[],'garnitures'=>[$garnitures['Oeuf'],$garnitures['Fromage']],'sauces'=>[]],
            ['name'=>'CBO','price'=>6.50,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Tomate'],$garnitures['Bacon']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Hamburger','price'=>4.00,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Oignon'],$garnitures['Cornichon']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'McWrap New York & Poulet Bacon','price'=>6.50,'pain'=>$pains['Wrap'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Tomate'], $garnitures['Bacon']],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'Royal Cheese','price'=>6.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Cornichon'],$garnitures['Tomate']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Boîte 20 McNuggets','price'=>15.00,'pain'=>[],'viandes'=>[$viandes['Poulet']],'garnitures'=>[],'sauces'=>[]],
            ['name'=>'P’tit Wrap Ranch','price'=>5.50,'pain'=>$pains['Wrap'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Egg & Bacon McMuffin','price'=>5.00,'pain'=>$pains['Classique'],'viandes'=>[],'garnitures'=>[$garnitures['Oeuf'],$garnitures['Fromage'],$garnitures['Bacon']],'sauces'=>[]],
            ['name'=>'Double Cheeseburger','price'=>6.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Boeuf'],$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Cornichon']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Royal Deluxe','price'=>7.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Cornichon'],$garnitures['Tomate']],'sauces'=>[$sauces['Blanche'],$sauces['Biggy']]],
            ['name'=>'Royal Bacon','price'=>7.50,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Oignon'],$garnitures['Cornichon'],$garnitures['Bacon']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Big Tasty 1 Steak','price'=>8.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Tomate']],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'Big Tasty 2 Steaks','price'=>8.00,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Tomate']],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'280 Original','price'=>8.50,'pain'=>$pains['Classique'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Cornichon'],$garnitures['Tomate']],'sauces'=>[$sauces['Biggy'],$sauces['Ketchup']]],
            ['name'=>'Double Cheese Bacon','price'=>8.00,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Cornichon'],$garnitures['Bacon']],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Big Arch','price'=>8.50,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Salade'],$garnitures['Oignon'],$garnitures['Cornichon']],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'McCrispy','price'=>6.50,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Salade'],$garnitures['Tomate']],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'McCrispy Bacon','price'=>7.00,'pain'=>$pains['Brioche'],'viandes'=>[$viandes['Poulet']],'garnitures'=>[$garnitures['Salade'],$garnitures['Tomate'],$garnitures['Bacon']],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'McExtreme 1 Steak','price'=>8.50,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Bacon']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McExtreme 2 Steaks','price'=>9.50,'pain'=>$pains['Sésame'],'viandes'=>[$viandes['Boeuf'],$viandes['Boeuf']],'garnitures'=>[$garnitures['Fromage'],$garnitures['Oignon'],$garnitures['Bacon']],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Chicken Wings','price'=>6.00,'pain'=>[],'viandes'=>[$viandes['Poulet']],'garnitures'=>[],'sauces'=>[]],
        ];

        foreach ($burgersData as $data) {
            $burger = new Burger();
            $burger->setName($data['name']);
            $burger->setPrice($data['price']);
            
            if (!empty($data['pain']) && $data['pain'] instanceof Pain) {
                $burger->setPain($data['pain']);
            } else {
                $burger->setPain(null); // pas de pain
            }

            // Viandes
            foreach ($data['viandes'] ?? [] as $viande) {
                $burger->addViande($viande);
            }

            // Garnitures
            foreach ($data['garnitures'] ?? [] as $garniture) {
                $burger->addGarniture($garniture);
            }

            // Sauces
            foreach ($data['sauces'] ?? [] as $sauce) {
                $burger->addSauce($sauce);
            }

            // Image (optionnelle)
            $image = new Image();
            $image->setName('burger_images/' . strtolower(str_replace(' ', '_', $data['name'])) . '.png');
            $burger->setImage($image);
            $manager->persist($image);

            $manager->persist($burger);
        }

        $manager->flush();

    }
}