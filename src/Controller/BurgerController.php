<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burgers_list')]
    public function list(): Response
    {
        $burgers = [
            1 => ['nom' => 'CheeseBurger', 'description' => 'Un classique avec fromage fondu', 'prix' => 8],
            2 => ['nom' => 'Double Steak', 'description' => 'Deux steaks généreux avec cheddar', 'prix' => 10],
            3 => ['nom' => 'Vegan Burger', 'description' => 'Un burger 100% végétal', 'prix' => 9],
        ];

        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers
        ]);
    }

    #[Route('/burger/{id}', name: 'burger_show')]
    public function show(int $id): Response
    {
        $burgers = [
            1 => ['nom' => 'CheeseBurger', 'description' => 'Un classique avec fromage fondu', 'prix' => 8],
            2 => ['nom' => 'Double Steak', 'description' => 'Deux steaks généreux avec cheddar', 'prix' => 10],
            3 => ['nom' => 'Vegan Burger', 'description' => 'Un burger 100% végétal', 'prix' => 9],
        ];

        if (!isset($burgers[$id])) {
            return $this->render('burger_not_found.html.twig', [
                'id' => $id
            ]);
        }

        return $this->render('burger_show.html.twig', [
            'id' => $id,
            'burger' => $burgers[$id],
        ]);
    }
}
