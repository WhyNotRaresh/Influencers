<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Tests\ProductRepositoryClass;

class PageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function mainPage() {
        $test = new ProductRepositoryClass();

        return new Response('Hello World!');
    }
}