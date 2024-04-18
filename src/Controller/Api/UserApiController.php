<?php

namespace App\Controller\Api;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UserApiController extends AbstractController
{
    #[Route('/api/user/me', name: 'api_user_me')]
    public function me():Response
    {
       
        return $this->json(["message"=>"ok"], 200, []);
    }
}
