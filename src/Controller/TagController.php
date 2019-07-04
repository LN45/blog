<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 18/11/18
 * Time: 16:15
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tag;

class TagController extends AbstractController
{
    /**
     * @Route("/tag/{name}", name="tag")
     */
    public function tag(Tag $tag) : Response
    {
        return $this->render('tag/tag.html.twig',[
            'tag' => $tag,
            'articles' => $tag->getArticles()
        ]);
    }
}