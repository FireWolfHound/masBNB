<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

    /**
     *
     * @Route("/", name="homepage")
     *
     */
    public function home()
    {
        return $this->render('home.html.twig', [
            "age" => 19,
            "title" => "bonjour",
            "tableau" => [
                'Jean' => 13,
                "Yves" => 15,
                'Pauline' => 19]
        ]);
    }

    /**
     *
     * @Route("/hello/{prenom}", name="hello")
     */
    public function hello($prenom = "Test")
    {
        return new Response("coucou $prenom ");
    }

}


?>