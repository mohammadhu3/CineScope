<?php
namespace App\Controller;
use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film_index')]
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findBy([], ['releaseYear' => 'DESC']);

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/films/{id}', name: 'app_film_show', requirements: ['id' => '\d+'])]
    public function show(Film $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }
}

