<?php

namespace App\Controller;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TeamController extends AbstractController
{
    public function __construct(
        private TeamRepository $teamRepository,
        private SerializerInterface $serializer
    ) {
    }

    #[Route('/team', name: 'team')]
    public function add(Request $request): Response
    {
        $json = $request->getContent();
        $data = $this->serializer->decode($json, 'json');
        return $this->json($data);
    }

    #
}
