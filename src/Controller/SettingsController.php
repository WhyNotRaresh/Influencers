<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
	/**
	 * @Route("/settings/darkmode/{status}", name="darkMode")
	 */
	public function toggleDarkMode() {

	}
}