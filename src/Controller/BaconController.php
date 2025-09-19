<?php

namespace App\Controller;

use App\Entity\Bacon;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaconController extends AbstractController
{
    #[Route('/bacons', name: 'bacons_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $bacons = $doctrine->getRepository(Bacon::class)->findAll();

        return $this->render('bacon/index.html.twig', [
            'bacons' => $bacons,
        ]);
    }
}
