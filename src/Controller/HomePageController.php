<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    /**
     * @Route("/home", name="home_page")
     */
    public function index()
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route("/crud", name="home_page_crud")
     */
    public function crud()
    {
        return $this->render('home_page/crud.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
