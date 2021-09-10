<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    #[Route('/player', name: 'player_browse')]
    public function browse(PlayerRepository $playerRepository): Response
    {
        return $this->render('player/browse.html.twig', [
            'players' => $playerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/player/{id}", name="player_read", methods={"GET"}, requirements={"id" : "\d+"})
     */
    public function read(Player $player): Response
    {
        return $this->render('player/read.html.twig', [
            'player' => $player,
        ]);
    }

    #[Route('/player/delete/{id}', name: 'player_delete')]
    public function delete(EntityManagerInterface $em, ?int $id, PlayerRepository $playerRepository)
    {
  
      $player = $playerRepository->find($id);
      $em->remove($player);
      $em->flush();
      return $this->redirectToRoute('player_browse');
    }
}
