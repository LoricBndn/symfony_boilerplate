<?php

namespace App\Controller;

use App\Entity\Poulet;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PouletController extends AbstractController
{
    #[Route('/poulets', name: 'poulets_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $poulets = $doctrine->getRepository(Poulet::class)->findAll();

        return $this->render('poulet/index.html.twig', [
            'poulets' => $poulets,
        ]);
    }
}
