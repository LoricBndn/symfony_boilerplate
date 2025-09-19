<?php

namespace App\Controller;

use App\Entity\Poisson;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoissonController extends AbstractController
{
    #[Route('/poissons', name: 'poissons_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $poissons = $doctrine->getRepository(Poisson::class)->findAll();

        return $this->render('poisson/index.html.twig', [
            'poissons' => $poissons,
        ]);
    }
}
