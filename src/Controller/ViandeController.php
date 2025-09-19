<?php

namespace App\Controller;

use App\Entity\Viande;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViandeController extends AbstractController
{
    #[Route('/viandes', name: 'viandes_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $viandes = $doctrine->getRepository(Viande::class)->findAll();

        return $this->render('viande/index.html.twig', [
            'viandes' => $viandes,
        ]);
    }
}
