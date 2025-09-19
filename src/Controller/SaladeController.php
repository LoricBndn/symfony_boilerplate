<?php

namespace App\Controller;

use App\Entity\Salade;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaladeController extends AbstractController
{
    #[Route('/salades', name: 'salades_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $salades = $doctrine->getRepository(Salade::class)->findAll();

        return $this->render('salade/index.html.twig', [
            'salades' => $salades,
        ]);
    }
}
