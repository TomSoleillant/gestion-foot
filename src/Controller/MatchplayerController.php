<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchplayerController extends AbstractController
{
    #[Route('/matchplayer', name: 'matchplayer')]
    public function index(): Response
    {
        return $this->render('matchplayer/index.html.twig', [
            'controller_name' => 'MatchplayerController',
        ]);
    }
}
