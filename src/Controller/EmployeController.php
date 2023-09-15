<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(EmployeRepository $er): Response
    {
      $employes = $er->findBy([],['prenom'=>'ASC']);
        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
        ]);
    }
    #[Route('/employe/{id}', name: 'show_employe')]
    public function show(Employe $Employe): Response {

        return $this->render('employe/show.html.twig', [
            'employe'=>$Employe
        ]);
    }
}
