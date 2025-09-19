<?php

namespace App\Controller;

use App\Entity\Fromage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FromageController extends AbstractController
{
    #[Route('/fromages', name: 'fromages_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $fromages = $doctrine->getRepository(Fromage::class)->findAll();

        return $this->render('fromage/index.html.twig', [
            'fromages' => $fromages,
        ]);
    }
}
