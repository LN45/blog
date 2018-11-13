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
use Symfony\Component\HttpKernel\Exception;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\ArticleSearchType;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{

    /**
     * @Route("/blog/{slug}", name="blog_title", requirements={"slug"="([a-z0-9-]+)"})
     */
    public function showTitle($slug = "Article Sans Titre")
    {
        return $this->render('blog/showTitle.html.twig',[
            'slug' => str_replace('-',' ', ucwords($slug)),
        ]);
    }

    /**
     *
     * @Route("/category", name="blog_index")
     * @return Response A response instance
     */
    public function index(Request $request): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        $category = new Category();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        $form = $this->createForm(
            CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

        }

        return $this->render(
            'blog/index.html.twig', [
                'articles' => $articles,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * Getting a article with a formatted slug for title
     *
     * @param string $slug The slugger
     *
     * @Route("blog/{slug<^[a-z0-9-]+$>}",
     *     defaults={"slug" = null},
     *     name="blog_show")
     *  @return Response A response instance
     */
    public function show($slug) : Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find an article in article\'s table.');
        }

        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article with ' . $slug . ' title, found in article\'s table.'
            );
        }

        return $this->render(
            'blog/show.html.twig', [
                'article' => $article,
                'slug' => $slug
            ]
        );
    }

    /**
     *
     * @Route("/blog/category/{category}", name="blog_show_category")
     * @return Response A response instance
     */
    public function showByCategory(string $category){
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => $category]);

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['category'=>$category->getId()],['id' => 'DESC'],3);
        return $this->render('blog/category.html.twig',[
            'category' => $category,
            'articles' => $articles
            ]
        );
    }
}