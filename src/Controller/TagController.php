<?php


namespace App\Controller;


use App\ArrayValue;
use App\Entity\Tags;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
	/**
	 * @Route("/get/tags/{inputText}", name="getTags")
	 */
	public function getTags($inputText) {
		$response = new JsonResponse();

		$tagList = $this->getDoctrine()->getRepository(Tags::class)
			->getByStartOfName($inputText);

		if ($tagList != null) {
			$tagList = array_slice($tagList, 0, 3);

			$response->setData($tagList);
		}

		return $response;
	}
}