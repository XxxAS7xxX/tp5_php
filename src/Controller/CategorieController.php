<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'app_categories', methods:'GET')]
    public function listeCategories(CategorieRepository $repo)
    {
        $categories=$repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $categories
        ]);
    }
    #[Route('/categorie/{id}', name: 'app_ficheCategorie', methods:'GET')]
    public function ficheCategories(Categorie $categorie)
    {
        
        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie' => $categorie
        ]);
    }
}
