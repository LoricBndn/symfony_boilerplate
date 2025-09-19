<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Cornichon;
use App\Entity\Sauce;
use App\Entity\Fromage;
use App\Entity\Salade;
use App\Entity\Viande;
use App\Entity\Poulet;
use App\Entity\Poisson;
use App\Entity\Bacon;
use App\Entity\Tomate;
use App\Entity\Oeuf;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ----------------------------
        // Création des ingrédients
        // ----------------------------
        $pain = new Pain();
        $pain->setName('Pain classique');
        $manager->persist($pain);

        $salade = new Salade();
        $salade->setName('Salade verte');
        $manager->persist($salade);

        $fromage = new Fromage();
        $fromage->setName('Fromage');
        $manager->persist($fromage);

        $oignon = new Oignon();
        $oignon->setName('Oignon');
        $manager->persist($oignon);

        $cornichon = new Cornichon();
        $cornichon->setName('Cornichon');
        $manager->persist($cornichon);

        $viande = new Viande();
        $viande->setName('Viande');
        $manager->persist($viande);

        $poulet = new Poulet();
        $poulet->setName('Poulet');
        $manager->persist($poulet);

        $poisson = new Poisson();
        $poisson->setName('Poisson');
        $manager->persist($poisson);

        $bacon = new Bacon();
        $bacon->setName('Bacon');
        $manager->persist($bacon);

        $tomate = new Tomate();
        $tomate->setName('Tomate');
        $manager->persist($tomate);

        $oeuf = new Oeuf();
        $oeuf->setName('Oeuf');
        $manager->persist($oeuf);

        // Création des sauces
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
            ['name'=>'Big Mac','price'=>5.99,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Mayonnaise']]],
            ['name'=>'Chicken McNuggets','price'=>4.50,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[]],
            ['name'=>'Veggie McPlant Nuggets','price'=>4.50,'poulets'=>[],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup']]],
            ['name'=>'McVeggie','price'=>5.00,'poulets'=>[],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McWrap Veggie','price'=>5.50,'poulets'=>[],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'Filet-O-Fish','price'=>5.50,'poissons'=>[$poisson],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poulets'=>[],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'Filet-O-Fish Deluxe','price'=>6.00,'poissons'=>[$poisson],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'viandes'=>[],'poulets'=>[],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McFish','price'=>4.50,'poissons'=>[$poisson],'fromages'=>[],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poulets'=>[],'sauces'=>[$sauces['Ketchup']]],
            ['name'=>'McFish Mayo','price'=>4.50,'poissons'=>[$poisson],'fromages'=>[],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poulets'=>[],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'P’tit Chicken','price'=>4.50,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'Croque McDo','price'=>4.00,'poulets'=>[],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[]],
            ['name'=>'McChicken','price'=>5.00,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Mayonnaise']]],
            ['name'=>'Cheeseburger','price'=>4.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Egg & Cheese McMuffin','price'=>4.50,'oeufs'=>[$oeuf],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'tomates'=>[],'viandes'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[]],
            ['name'=>'CBO','price'=>6.50,'poulets'=>[$poulet],'fromages'=>[$fromage],'salades'=>[$salade],'viandes'=>[],'poissons'=>[],'oignons'=>[$oignon],'cornichons'=>[],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[$tomate],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Hamburger','price'=>4.00,'viandes'=>[$viande],'fromages'=>[],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'McWrap New York & Poulet Bacon','price'=>6.50,'poulets'=>[$poulet],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[$tomate],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'Royal Cheese','price'=>6.00,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Boîte 20 McNuggets','price'=>15.00,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[]],
            ['name'=>'P’tit Wrap Ranch','price'=>5.50,'poulets'=>[$poulet],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[$oignon],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Egg & Bacon McMuffin','price'=>5.00,'oeufs'=>[$oeuf],'fromages'=>[$fromage],'bacons'=>[$bacon],'salades'=>[],'oignons'=>[],'cornichons'=>[],'tomates'=>[],'viandes'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[]],
            ['name'=>'Double Cheeseburger','price'=>6.50,'viandes'=>[$viande,$viande] ?? [$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Royal Deluxe','price'=>7.00,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Blanche'],$sauces['Biggy']]],
            ['name'=>'Royal Bacon','price'=>7.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Big Tasty','price'=>8.00,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[$oignon],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'280 Original','price'=>8.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Biggy'],$sauces['Ketchup']]],
            ['name'=>'Double Cheese Bacon','price'=>8.00,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Ketchup'],$sauces['Moutarde']]],
            ['name'=>'Big Arch','price'=>8.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[$salade],'oignons'=>[$oignon],'cornichons'=>[$cornichon],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Blanche']]],
            ['name'=>'McCrispy','price'=>6.50,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[$tomate],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'McCrispy Bacon','price'=>7.00,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[$salade],'oignons'=>[],'cornichons'=>[],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[$tomate],'viandes'=>[],'poissons'=>[],'sauces'=>[$sauces['Barbecue']]],
            ['name'=>'McExtreme 1 Steak','price'=>8.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'McExtreme 2 Steaks','price'=>9.50,'viandes'=>[$viande],'fromages'=>[$fromage],'salades'=>[],'oignons'=>[$oignon],'cornichons'=>[],'bacons'=>[$bacon],'oeufs'=>[],'tomates'=>[],'poulets'=>[],'poissons'=>[],'sauces'=>[$sauces['Biggy']]],
            ['name'=>'Chicken Wings','price'=>6.00,'poulets'=>[$poulet],'fromages'=>[],'salades'=>[],'oignons'=>[],'cornichons'=>[],'bacons'=>[],'oeufs'=>[],'tomates'=>[],'viandes'=>[],'poissons'=>[],'sauces'=>[]],
        ];


        foreach ($burgersData as $data) {
            $burger = new Burger();
            $burger->setName($data['name']);
            $burger->setPrice($data['price']);
            $burger->setPain($pain);

            // Associations
            foreach ($data['viandes'] ?? [] as $v) {
                $burger->addViande($v);
            }
            foreach ($data['poulets'] ?? [] as $p) {
                $burger->addPoulet($p);
            }
            foreach ($data['poissons'] ?? [] as $p) {
                $burger->addPoisson($p);
            }
            foreach ($data['fromages'] ?? [] as $f) {
                $burger->addFromage($f);
            }
            foreach ($data['salades'] ?? [] as $s) {
                $burger->addSalade($s);
            }
            foreach ($data['oignons'] ?? [] as $o) {
                $burger->addOignon($o);
            }
            foreach ($data['cornichons'] ?? [] as $c) {
                $burger->addCornichon($c);
            }
            foreach ($data['bacons'] ?? [] as $b) {
                $burger->addBacon($b);
            }
            foreach ($data['oeufs'] ?? [] as $o) {
                $burger->addOeuf($o);
            }
            foreach ($data['tomates'] ?? [] as $t) {
                $burger->addTomate($t);
            }
            foreach ($data['sauces'] ?? [] as $s) {
                $burger->addSauce($s);
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
