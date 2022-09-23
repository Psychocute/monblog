<?php

namespace App\Service;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CommentService
{
    public function __construct(
        private ArticleRepository  $articleRepo,
        private CommentRepository      $commentRepo,
        private PaginatorInterface    $paginator,
        private RequestStack           $requestStack,

    )
    {

    }

    public function getPaginatedComments(?Article $article = null) {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 4;
        $commentsQuery = $this->commentRepo->findForPagination($article);

        return $this->paginator->paginate($commentsQuery, $page, $limit);
        
    }


}