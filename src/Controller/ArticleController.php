<?php


namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Authors;
use App\Types\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function mainPage() {
        $arrArt = $this->getDoctrine()->getRepository(Articles::class)->findAll();

        return $this->render('article/showArticles.html.twig', ['articleArray' => array_reverse($arrArt)]);
    }

	/**
	 * @Route("/article_{articleID}", name="showArticleDetail")
	 */
	public function showArticleDetail($articleID, Request $request) {
		$article = $this->getDoctrine()->getRepository(Articles::class)
			->getById($articleID);

		$like_value = $request->cookies->get('liked_post_'.$articleID);

		return $this->render('article/showArticleDetail.html.twig',
		[
			'article' => $article,
			'like_value' => $like_value
		]);
	}

	/**
	 * @Route("/article_like/{articleID}", name="like")
	 */
	public function postLike($articleID, Request $request) {
		// adding the like to the DB
		$article = $this->getDoctrine()->getRepository(Articles::class)
			->getById($articleID);

		if ($request->cookies->get('liked_post_'.$articleID) == null)
			$article->addLike();

		$this->getDoctrine()->getManager()->flush();

		return $this->json(['likes' => $article->getNumberLikes()]);
	}

	/**
	 * @Route("/addPost", name="addPost")
	 */
	public function addPost(Request $request) {
		$article = new Articles();
		$form = $this->createForm(ArticleType::class, $article);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {

			$author = $this->getDoctrine()->getRepository(Authors::class)
				->getByMail($form['author']->get('mail')->getData());
			$em = $this->getDoctrine()->getManager();

			if ($author != null) {
				//mail already in db
				if ($author->getName() == $form['author']->get('name')->getData()) {
					// all good
					$article->setAuthor($author);
					$em->persist($article);
					$em->flush();
					return $this->redirectToRoute('articles');
				} else {
					// mail and name do not match
					return $this->redirectToRoute('addPost');
				}
			} else {
				// new mail => new user
				$author = $form['author']->getData();
				$article->setAuthor($author);
				$em->persist($author);
				$em->persist($article);
				$em->flush();
				return $this->redirectToRoute('articles');
			}
		}

		return $this->render('article/addNewArticle.html.twig', ['form' => $form->createView()]);
	}
}