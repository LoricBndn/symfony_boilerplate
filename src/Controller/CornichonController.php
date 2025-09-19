<?php

namespace App\Controller;

use App\Entity\Cornichon;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CornichonController extends AbstractController
{
    #[Route('/cornichons', name: 'cornichons_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $cornichons = $doctrine->getRepository(Cornichon::class)->findAll();

        return $this->render('cornichon/index.html.twig', [
            'cornichons' => $cornichons,
        ]);
    }
}
