<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use App\Repository\PlatformeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlatformeController extends AbstractController
{
    #[Route('/platformes', name: 'app_platforme_index')]
    public function index(PlatformeRepository $platformeRepository): Response
    {
        $platformes = $platformeRepository->findAll();

        return $this->render('platforme/index.html.twig', [
            'platformes' => $platformes,
        ]);
    }

    #[Route('/platformes/{id}', name: 'app_platforme_show')]
    public function show(FilmRepository $filmsRepository, PlatformeRepository $platforme): Response
    {
        $films = $filmsRepository->findByPlatforme($platforme);

        return $this->render('platforme/show.html.twig', [
            'films' => $films,
        ]);
    }
}
