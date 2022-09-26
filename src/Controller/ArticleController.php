<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\Type\CommentType;
use App\Service\CommentService;
use App\Controller\CommentController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'article_show')]
    public function show(?Article $article, CommentService $commentService): Response
    {
        if(!$article) {
            return $this->redirectToRoute('app_home');

        }

        $commment = New Comment($article);

        // $commentForm = $this->createForm(CommentType::class, $commment);
        $commentForm = $this->createForm(CommentType::class, $commment, [
            'action' => $this->generateUrl('comment_add'),
            'method' => 'POST',
        ]);


        return $this->renderForm('article/index.html.twig', [
            'article' => $article,
            'comments' => $commentService->getPaginatedComments($article),
            'commentForm' => $commentForm
        ]);
    }
}
