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
        $authArr = $this->getDoctrine()->getRepository(Authors::class)
	        ->findBy([], ['numberLikes' => 'DESC']);

        foreach ($authArr as $author) {
			$artArr =  $author->getArticleList();
			$length = count($artArr);

			if ($length == 0) continue;

        	$author->setNumberLikes(
        		$artArr[$length - 1]->getNumberLikes() + $author->getNumberLikes()
	        );
        }

		usort($authArr, function ($a, $b) {
			return $b->getNumberLikes() - $a->getNumberLikes();
		});

        return $this->render('author/showTopAuth.html.twig', ['authorArray' => $authArr]);
    }
}