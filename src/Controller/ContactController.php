<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts')]
    public function listeContact(){
        return $this->render('contact/listeContacts.html.twig');
    }
}
