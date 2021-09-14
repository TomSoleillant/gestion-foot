<?php

namespace App\Controller;

use App\Entity\Matchplayer;
use App\Form\MatchplayerType;
use App\Repository\MatchplayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchplayerController extends AbstractController
{
    #[Route('/matchplayer/add', name: 'matchplayer_add')]
    #[IsGranted('ROLE_ADMIN')]
    public function add(Request $request)
    {
      $matchplayer = new Matchplayer();

      $form = $this->createForm(MatchplayerType::class, $matchplayer);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($matchplayer);
          $em->flush();

          return $this->redirectToRoute('player_read', [
              'id' => $matchplayer->getPlayer(),
          ]);
      }

      return $this->render('matchplayer/add.html.twig', [
          'form' => $form->createView(),
      ]);
    }
    
    #[Route('/matchplayer/edit/{id}', name: 'matchplayer_edit')]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Matchplayer $matchplayer): Response
    {
        $form = $this->createForm(MatchplayerType::class, $matchplayer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('player_read', [
                'id' => $matchplayer->getPlayer(),
            ]);
        }
        
        return $this->render('matchplayer/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/matchplayer/delete/{id}', name: 'matchplayer_delete')]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(EntityManagerInterface $em, ?int $id, MatchplayerRepository $matchplayerRepository)
    {
  
      $matchplayer = $matchplayerRepository->find($id);
      $em->remove($matchplayer);
      $em->flush();
      return $this->redirectToRoute('player_read', [
        'id' => $matchplayer->getPlayer(),
    ]);
    }
}
