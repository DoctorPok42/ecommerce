<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Connection;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager,UserInterface|null $user): Response
    {
        $userId = 0;

        if ($user) {
            $userId = $user->getId();
        }

        $articles = $entityManager->getRepository(Article::class)->findAll();
        
        $cartArticles = $entityManager->getRepository(Cart::class)->findBy(['user_id' => $userId]);

        $articlesInCart = [];

        foreach ($cartArticles as $cartArticle) {
            $articlesInCart[] = $entityManager->getRepository(Article::class)->findOneBy(['id' => $cartArticle->getArticleId()]);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articles,
            'userId' => $userId,
            'cartArticles' => $articlesInCart
        ]);
    }
}
