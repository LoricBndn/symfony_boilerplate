<?php

namespace App\Controller;

use App\Entity\Burger;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burgers_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        // Récupère tous les burgers depuis la BDD
        $burgers = $doctrine->getRepository(Burger::class)->findAll();

        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/burger/{id}', name: 'burger_show')]
    public function show(int $id, ManagerRegistry $doctrine): Response
    {
        $burger = $doctrine->getRepository(Burger::class)->find($id);

        if (!$burger) {
            throw $this->createNotFoundException('Burger non trouvé');
        }

        return $this->render('burger_show.html.twig', [
            'burger' => $burger,
        ]);
    }
}
