<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Image;
use App\Form\AnnonceType;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index( AdRepository $repo )
    {
        $ads = $repo->findAll();
        return $this->render('ad/index.html.twig',[
            'ads' => $ads
        ]);

    }

    /**
     * @Route("/ads/new", name="ads_new")
     */
    public function create(Request $request){

        $ad = new Ad();

        $form = $this->createForm(AnnonceType::class, $ad);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($ad);
            $manager->flush();

            $this->addFlash('success', "L'annonce <strong>{$ad->getTitle()}</strong> a bien été ajouté !");

            return $this->redirectToRoute('ads_show', [
               'slug' => $ad->getSlug()
            ]);
        }

        return $this->render('ad/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/ads/{slug}", name="ads_show")
     */
    public function show( Ad $ad){
//        $ad = $repo->findOneBySlug($slug);
        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }
}
