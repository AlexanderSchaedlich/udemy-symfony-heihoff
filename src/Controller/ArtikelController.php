<?php

namespace App\Controller;

use App\Entity\Artikel;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtikelController extends AbstractController
{
    /**
     * @Route("/artikel", name="app_artikel")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $artikel = new Artikel();
        $artikel->setTitel('123 Artikel');

        $manager = $doctrine->getManager();
        // $manager->persist($artikel);
        // $manager->flush();

        // return new Response('Artikel wurde angelegt.');

        $erster_artikel = $manager->getRepository(Artikel::class)->findOneBy(
            [
                'id' => 1
            ]
        );

        $manager->remove($erster_artikel);
        $manager->flush();

        return $this->render(
            'artikel/index.html.twig',
            [
                'artikel' => $erster_artikel
            ]
        );

    }
}
