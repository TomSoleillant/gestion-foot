<?php

namespace App\Controller;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    #[Route('/team', name: 'team_browse')]
    public function browse(TeamRepository $teamRepository): Response
    {        
        return $this->render('team/browse.html.twig', [
            'teams' => $teamRepository->findAll(),
        ]);
    }

    /**
     * @Route("/team/{id}", name="team_read", methods={"GET"}, requirements={"id" : "\d+"})
     */
    public function read(Team $team): Response
    {
        return $this->render('team/read.html.twig', [
            'team' => $team,
        ]);
    }

    #[Route('/team/delete/{id}', name: 'team_delete')]
    public function delete(?int $id, TeamRepository $teamRepository)
    {
      $em = $this->getDoctrine()->getManager();
      $team = $teamRepository->find($id);
      $em->remove($team);
      $em->flush();
      return $this->redirectToRoute('team_browse');
    }

}
