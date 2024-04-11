<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\UtilsService;
use App\Repository\UserRepository;

class RegisterController extends AbstractController
{

    public function __construct(private EntityManagerInterface $em, private UserRepository $userRepository)
    {
    }
    #[Route('/register/add', name: 'app_register_add')]
    public function add(Request $request) : Response 
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($user);
            $this->em->flush();
        }
        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
