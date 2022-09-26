<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\Type\CommentType;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Service\CommentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/ajax/comments', name: 'comment_add')]
    public function add(Request $request, 
        ArticleRepository $articleRepo, 
        EntityManagerInterface $em, 
        CommentRepository $commentRepo
        )

    { 
    
        }

        #[Route('/comments/create', name: 'comment_add')]
        public function createComments(Request $request, 
            ArticleRepository $articleRepo, 
            EntityManagerInterface $em, 
            CommentRepository $commentRepo,
            CommentService $commentService
            ): Response

        {

            $commentData = $request->request->all('comment');

            $article = $articleRepo->find($commentData['article']);

            $user = $this->getUser();

            $comment = new Comment($article);
            $comment->setContent($commentData['content']);
            $comment->setUser($user);
            $comment->setCreatedAt(new \DateTime());

            $em->persist($comment);
            $em->flush();

            // return $this->redirectToRoute('article_show');
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