<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(EntityManagerInterface $entityManager): Response
    {
       $entreprises = $entityManager->getRepository(Entreprise::class)->findBy([],["raisonSociale"=>"ASC"]);
        return $this->render('entreprise/index.html.twig', [
            'entreprises'=>$entreprises
        ]);
    }

    #[Route('/entreprise/{id}', name: 'show_entreprise')]
    public function show(Entreprise $entreprise): Response {

        return $this->render('entreprise/show.html.twig', [
            'entreprise'=>$entreprise
        ]);
    }
}
