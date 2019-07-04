<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 09/11/18
 * Time: 14:23
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Tag;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}", name="article")
     */
    public function show(Article $article) : Response
    {
        return $this->render('article/article.html.twig',[
            'article' => $article,
            'tags' => $article->getTags(),
        ]);
    }

    /**
     * @Route("/find_category/{id}", name="find_category")
     */
    public function findCategory(Article $article) : Response
    {
        return $this->render('category/find_category.html.twig',[
            'article' => $article,
            'category' => $article->getCategory(),
        ]);
    }
}
