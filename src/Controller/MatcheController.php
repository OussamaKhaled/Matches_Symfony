<?php

namespace App\Controller;

use App\Entity\Matche;
use App\Form\MatchType;
use App\Form\SearchType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request ;
use App\Repository\MatcheRepository;

class MatcheController extends AbstractController
{
    #[Route('/matche', name: 'app_matche')]
    public function index(): Response
    {
        return $this->render('matche/index.html.twig', [
            'controller_name' => 'MatcheController',
        ]);
    }
    /*#[Route('/listmatche', name: 'list_matche')]
    public function list(ManagerRegistry $em): Response
    {
        $matche = $em->getRepository(Matche::class)->findAll();
       return $this->render (
        'matche/list.html.twig',
        ['matche'=>$matche,]
       );
    }*/
    #[Route('/listmatche', name: 'list_matche')]
    public function showStudents(MatcheRepository $st): Response{
    $matche=$st->orderByNbSpec();//orderByNbSpec();//findAll();
    return $this->render (
        'matche/list.html.twig',
        ['matche'=>$matche,]
       );
    }
    #[Route('/addmatch', name: 'add_match')]
    public function addVote(Request $req, ManagerRegistry $em):Response{
        $matche=new Matche();
        $form=$this->createForm (MatchType::class,$matche);

        $form -> handleRequest($req);

        if ($form -> isSubmitted()){
            $manager = $em -> getManager();
            $manager ->persist ($matche);
            $manager->flush();
            return $this->redirectToRoute('list_matche');

        }
        
        
      return $this->render(
        "matche/add.html.twig",["form"=>$form->createView()]
      );
    }
    #[Route('/matchsearch', name: 'matche_search')]
    public function showStudentsSearch(Request $req,MatcheRepository $st): Response{
    $matche=$st->findAll();
    $form=$this ->createForm(SearchType::class);
    $form -> handleRequest($req);
    
    if($form->isSubmitted()){
        $dateM =$form ['dateM']->getData();
        $matche=$st->searchByDate($dateM);
    }
    return $this->render (
        'matche/matchsearch.html.twig',
        ['matche'=>$matche,
        'form'=>$form->createview(),]
       );
    }
    
    
}
