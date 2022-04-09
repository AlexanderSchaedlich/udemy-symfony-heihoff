<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestViewController extends AbstractController
{
    /**
     * @Route("/test/view", name="app_test_view")
     */
    public function index(): Response
    {
        $day = date("l");
        $user = [
            'first_name' => "Alex",
            'last_name' => 'Schädlich',
            'age' => 29
        ];

        return $this->render('test_view/index.html.twig', [
            'controller_name' => 'TestViewController',
            'day' => $day,
            'user' => $user

        ]);
    }
}
