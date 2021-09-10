<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/player/add', name: 'player_add')]
    public function add(Request $request)
    {
      $player = new Player();

      $form = $this->createForm(PlayerType::class, $player);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($player);
          $em->flush();

          return $this->redirectToRoute('player_browse');
      }

      return $this->render('player/add.html.twig', [
          'form' => $form->createView(),
      ]);
    }

    #[Route('/player/edit/{id}', name: 'player_edit')]
    public function edit(Request $request, Player $player)
    {
      $form = $this->createForm(PlayerType::class, $player);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $this->getDoctrine()->getManager()->flush();
          return $this->redirectToRoute('player_browse');
      }

      return $this->render('player/edit.html.twig', [
          'form' => $form->createView(),
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
