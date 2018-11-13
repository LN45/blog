<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 02/11/18
 * Time: 15:18
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/url")
     */
    public function index()
    {
        return new Response(
            $this->render('home/home.html.twig')
        );
    }
}