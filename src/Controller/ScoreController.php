<?php

namespace App\Controller;

use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;


class ScoreController extends AbstractController
{
    #[Route('/score', name: 'app_score')]
    public function index(ScoreRepository $scoreRepository, SerializerInterface $serializerInterface): Response
    {
        //récupération des scores
        $scores = $scoreRepository->findScore();
        //sérialisation des scores en JSON
        $json = $this->json($scores, 200, ['Content-Type' => 'application/json']);
        //retourne la vue
        return $this->render('score/index.html.twig', [
            'scores' => $json->getContent(),
        ]);
    }
}
