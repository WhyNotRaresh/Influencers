<?php


namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Authors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/topAuthors", name="topAuthors")
     */
    public function showTopAuthors() {
        $authArr = $this->getDoctrine()->getRepository(Authors::class)->findAll();

        return $this->render('author/showTopAuth.html.twig', ['authorArray' => $authArr]);
    }
}