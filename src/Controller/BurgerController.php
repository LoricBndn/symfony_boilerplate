<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    private array $burgers = [
        1  => ['nom' => 'Big Mac', 'description' => 'Deux steaks, sauce spéciale, salade, fromage, cornichons et oignons', 'prix' => 5.90],
        2  => ['nom' => 'McChicken', 'description' => 'Filet de poulet pané, mayonnaise et salade', 'prix' => 5.50],
        3  => ['nom' => 'Cheeseburger', 'description' => 'Steak, fromage, ketchup, moutarde et cornichons', 'prix' => 3.50],
        4  => ['nom' => 'Hamburger', 'description' => 'Steak, ketchup, moutarde et cornichons', 'prix' => 3.00],
        5  => ['nom' => 'Double Cheeseburger', 'description' => 'Deux steaks avec double fromage', 'prix' => 4.50],
        6  => ['nom' => 'Filet-O-Fish', 'description' => 'Poisson pané, sauce tartare et fromage', 'prix' => 4.80],
        7  => ['nom' => 'Royal Cheese', 'description' => 'Steak, fromage, salade et sauce', 'prix' => 5.80],
        8  => ['nom' => 'Royal Deluxe', 'description' => 'Steak, fromage, bacon, salade et sauce spéciale', 'prix' => 6.50],
        9  => ['nom' => 'McVeggie', 'description' => 'Galette végétarienne, salade et sauce', 'prix' => 5.00],
        10 => ['nom' => 'McBacon', 'description' => 'Steak, bacon, fromage et sauce', 'prix' => 5.70],
        11 => ['nom' => 'Big Tasty', 'description' => 'Steak, fromage, salade, tomates et sauce Big Tasty', 'prix' => 7.20],
        12 => ['nom' => 'Big Tasty Bacon', 'description' => 'Steak, fromage, bacon, salade, tomates et sauce Big Tasty', 'prix' => 7.80],
        13 => ['nom' => 'McWrap Poulet', 'description' => 'Poulet, salade, tomates et sauce dans une tortilla', 'prix' => 6.00],
        14 => ['nom' => 'McWrap Veggie', 'description' => 'Galette végétarienne, légumes et sauce dans une tortilla', 'prix' => 6.00],
        15 => ['nom' => 'McNuggets 6 pcs', 'description' => 'Bouchées de poulet croustillantes avec sauces au choix', 'prix' => 5.00],
        16 => ['nom' => 'McNuggets 9 pcs', 'description' => 'Bouchées de poulet croustillantes avec sauces au choix', 'prix' => 7.00],
        17 => ['nom' => 'McNuggets 20 pcs', 'description' => 'Bouchées de poulet croustillantes avec sauces au choix', 'prix' => 12.00],
        18 => ['nom' => 'CBO', 'description' => 'Steak, bacon, fromage et sauce crémeuse', 'prix' => 6.20],
        19 => ['nom' => 'Double Big Mac', 'description' => 'Quatre steaks, double sauce, salade, fromage et cornichons', 'prix' => 8.50],
        20 => ['nom' => 'Grand McWrap', 'description' => 'Poulet, salade, tomates et sauce dans une grande tortilla', 'prix' => 7.00],
    ];

    #[Route('/burgers', name: 'burgers_list')]
    public function list(): Response
    {
        return $this->render('burgers_list.html.twig', [
            'burgers' => $this->burgers
        ]);
    }

    #[Route('/burger/{id}', name: 'burger_show')]
    public function show(int $id): Response
    {
        $burger = $this->burgers[$id] ?? null;

        return $this->render('burger_show.html.twig', [
            'id' => $id,
            'burger' => $burger,
        ]);
    }
}
