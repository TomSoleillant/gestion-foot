<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/team/add', name: 'team_add')]
    public function add(Request $request)
    {
      $team = new Team();

      $form = $this->createForm(TeamType::class, $team);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($team);
          $em->flush();

          return $this->redirectToRoute('team_browse');
      }

      return $this->render('team/add.html.twig', [
          'form' => $form->createView(),
      ]);
    
    }

    #[Route('/team/edit/{id}', name: 'team_edit')]
    public function edit(Request $request, Team $team)
    {
      $form = $this->createForm(TeamType::class, $team);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $this->getDoctrine()->getManager()->flush();
          return $this->redirectToRoute('team_browse');
      }

      return $this->render('team/edit.html.twig', [
          'form' => $form->createView(),
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
