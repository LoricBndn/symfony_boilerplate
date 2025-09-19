<?php

namespace App\Controller;

use App\Entity\Tomate;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TomateController extends AbstractController
{
    #[Route('/tomates', name: 'tomates_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $tomates = $doctrine->getRepository(Tomate::class)->findAll();

        return $this->render('tomate/index.html.twig', [
            'tomates' => $tomates,
        ]);
    }
}
