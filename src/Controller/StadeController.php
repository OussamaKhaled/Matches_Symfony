<?php

namespace App\Controller;

use App\Entity\Stade;
use App\Repository\StadeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StadeController extends AbstractController
{
    #[Route('/stade', name: 'app_stade')]
    public function index(): Response
    {
        return $this->render('stade/index.html.twig', [
            'controller_name' => 'StadeController',
        ]);
    }

    #[Route('/liststade', name: 'list_stade')]
    public function list(ManagerRegistry $em): Response
    {
        $stade = $em->getRepository(Stade::class)->findAll();
       return $this->render (
        'stade/list.html.twig',
        ['stade'=>$stade,]
       );
    }
    #[Route('/delstade/{id}', name: 'delete_stade')]
    public function delStudent($id, StadeRepository $repo):Response{
        $produit=$repo->find($id);
        $repo->remove($produit,true);
        
        
      return $this->redirectToRoute('list_stade');
    }
}
