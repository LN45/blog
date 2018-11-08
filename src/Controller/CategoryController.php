<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 08/11/18
 * Time: 14:09
 */

namespace App\Controller;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category_name")
     */
    public function show(Category $category) :Response
    {

        return $this->render('category.html.twig',[
            'category' => $category
        ]);
    }
}