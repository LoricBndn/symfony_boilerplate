<?php

namespace App\Controller;

use App\Entity\Garniture;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GarnitureController extends AbstractController
{
    #[Route('/garnitures', name: 'garnitures_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $garnitures = $doctrine->getRepository(Garniture::class)->findAll();

        return $this->render('garniture/index.html.twig', [
            'garnitures' => $garnitures,
        ]);
    }
}
