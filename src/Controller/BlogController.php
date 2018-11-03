<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 03/11/18
 * Time: 12:09
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{slug}", name="blog_title", requirements={"slug"="([a-z0-9-]+)"})
     */
    public function show($slug = "Article Sans Titre")
    {

        return $this->render('show.html.twig',[
            'slug' => str_replace('-',' ', ucwords($slug)),
        ]);
    }
}