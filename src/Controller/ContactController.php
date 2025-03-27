<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts')]
    public function listeContact()
    {
        $manager=$this->getDoctrine()->getManager();
        $repo=$manager->getRepository(Contact::class);
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',['lesContacts'=>$Contacts]);
    }
}
