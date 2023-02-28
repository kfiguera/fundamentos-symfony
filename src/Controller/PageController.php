<?php

namespace App\Controller;

use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/')]
    public function home(EntityManagerInterface $entityManager): Response
    {
        $comments = $this->getComments($entityManager);
        return $this->render('home.html.twig', compact('comments'));
    }

    private function getComments(EntityManagerInterface $entityManager)
    {
        return $entityManager->getRepository(Comment::class)->findBy([], [
            'id' => 'DESC'
        ]);
    }
}