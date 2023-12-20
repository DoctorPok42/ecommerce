<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(UserInterface|null $user):Response
    {
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }else{
            echo $user->getUsername().'<br>';
            echo $user->getPassword().'<br>';
            echo $user->getRoles()[0].' <br>';
            echo $user->getEmail().'<br>';
            echo $user->getBalance().'<br>';
            echo $user->getPic().'<br>';
            echo $user->getId().'<br>';

            return $this->render('profile/index.html.twig', [
                'controller_name' => 'ProfileController',
            ]);
        }
    }
}
