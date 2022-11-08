<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PodcastController extends AbstractController
{
    #[Route('/podcast/{slug}', name: 'podcast_show')]
    public function show(): Response
    {
        return $this->render('podcast/index.html.twig', [
            'controller_name' => 'PodcastController',
        ]);
    }
}