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
    #[Route('/categories/nbContactsParCat', name: 'app_nbContactsParCat', methods:'GET')]
    public function nbContactsParCat(CategorieRepository $repo)
    {
        $data="";
        $categories=$repo->nbContactsParCat();
        foreach($categories as $ligne){
            $data .='{ y: '.$ligne["nbContacts"]. ', label: "'.$ligne["libelle"].'"},';
        }
        $data=substr($data,0,-1);
        return $this->render('categorie/nbContactsParCat.html.twig', [
            'lesCategories' => $categories,
            'data' => $data
        ]);
    }
}
