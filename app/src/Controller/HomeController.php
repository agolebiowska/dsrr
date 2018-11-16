<?php
/**
 * Created by PhpStorm.
 * User: agatag
 * Date: 16.11.2018
 * Time: 15:18
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET"})
     */
    public function index()
    {
        return new JsonResponse( ['success' => true]);
    }
}