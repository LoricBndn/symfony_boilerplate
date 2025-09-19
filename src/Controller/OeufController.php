<?php

namespace App\Controller;

use App\Entity\Oeuf;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OeufController extends AbstractController
{
    #[Route('/oeufs', name: 'oeufs_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $oeufs = $doctrine->getRepository(Oeuf::class)->findAll();

        return $this->render('oeuf/index.html.twig', [
            'oeufs' => $oeufs,
        ]);
    }
}
