<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 09/11/18
 * Time: 23:33
 */

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     */
    public function show(Category $category) : Response
    {
        return $this->render('category.html.twig',[
            'category' => $category
        ]);
    }

    /**
     * @Route("/categories_list/{id}", name="categories_list")
     */
    public function index(Category $category) : Response
    {
        return $this->render('categories_list.html.twig', [
            'category' => $category,
            'articles' => $category->getArticles()
        ]);
    }
}