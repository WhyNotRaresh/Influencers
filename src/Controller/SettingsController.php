<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
	/**
	 * @Route("/settings/darkmode/{status}", name="darkMode")
	 */
	public function toggleDarkMode($status, Request $request) {
		$response = new Response();

		$request->cookies->remove('dark_mode');
		$response->headers->setCookie(
			new Cookie('dark-mode', $status, strtotime('+10 years'), '/')
		);

		return $response;
	}
}