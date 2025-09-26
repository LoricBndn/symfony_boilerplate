<?php

namespace App\Controller;

use App\Entity\Burger;
use App\Entity\Pain;
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

    #[Route('/burger/create', name: 'burger_create')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $pain = $doctrine->getRepository(Pain::class)->findOneBy([]);
        if (!$pain) {
            $this->addFlash('error', "Erreur : aucun pain trouvé en base");
            return $this->redirectToRoute('burgers_list');
        }

        $burger = new Burger();
        $burger->setName('Krabby Patty');
        $burger->setPrice(4.99);
        $burger->setPain($pain);

        $em->persist($burger);
        $em->flush();

        $this->addFlash('success', "Burger créé avec succès !");

        return $this->redirectToRoute('burgers_list');
    }

    #[Route('/burger/edit/{id}', name: 'burger_edit')]
    public function edit(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $burger = $doctrine->getRepository(Burger::class)->find($id);

        if (!$burger) {
            $this->addFlash('error', "Burger non trouvé");
            return $this->redirectToRoute('burgers_list');
        }

        $burger->setName($burger->getName() . ' (Édité)');
        $burger->setPrice($burger->getPrice() + 1.00);

        $em->persist($burger);
        $em->flush();

        $this->addFlash('success', "Burger modifié avec succès");

        return $this->redirectToRoute('burgers_list');
    }

    #[Route('/burger/delete/{id}', name: 'burger_delete')]
    public function delete(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $burger = $doctrine->getRepository(Burger::class)->find($id);

        if (!$burger) {
            $this->addFlash('error', "Burger non trouvé");
            return $this->redirectToRoute('burgers_list');
        }

        $em->remove($burger);
        $em->flush();

        $this->addFlash('success', "Burger supprimé avec succès");

        return $this->redirectToRoute('burgers_list');
    }

    #[Route('/burger/{id}', name: 'burger_show', requirements: ['id' => '\d+'])]
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
