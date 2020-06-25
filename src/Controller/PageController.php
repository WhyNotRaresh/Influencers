<?php


namespace App\Controller;

use App\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function mainPage() {
        $articles = $this->getDoctrine()->getRepository(Articles::class);
        $arrArt = array();

        for ($i = 1; ; $i++){
            $art = $articles->find(array('id' => $i));
            if (!$art) break;
            $arrArt[$i-1] = $art;
        }

        return $this->render('basicMainPage.html.twig', ['articleArray' => $arrArt]);
    }

    /**
     * @Route("/addPost")
     */
    public function addPost() {
        return new Response('Future page to add article...');
    }

    /**
     * @Route("/topAuthors")
     */
    public function showTopAuthors() {
        return new Response('Future page to show authors...');
    }
}