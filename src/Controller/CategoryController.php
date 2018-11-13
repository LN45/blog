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
    /*/**
     * @Route("/category/{id}", name="category")
     */
    /*public function show(Category $category) : Response
    {
        return $this->render('category/categoryId.html.twig',[
            'category' => $category
        ]);
    }*/

    /**
     * @Route("/category_name/{id}", name="category_name")
     */
    public function index(Category $category) : Response
    {
        return $this->render('category/category_name.html.twig', [
            'category' => $category,
            'articles' => $category->getArticles()
        ]);
    }
}