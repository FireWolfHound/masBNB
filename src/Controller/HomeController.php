<?php

namespace App\Controller;

use App\Service\Utilities;
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
    public function home(Utilities $utils)
    {
        $sayHello = $utils->sayHello("Maroussia");

        return $this->render('home.html.twig', [
            'hello' => $sayHello,
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