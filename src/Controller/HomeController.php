<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(): Response
    {
        $message = 'hello Symfony !';

        return $this->render('home/index.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/redir", "home_redir")
     */
    public function redir(): Response
    {
        return $this->redirectToRoute('school_year_index');
    }

}
