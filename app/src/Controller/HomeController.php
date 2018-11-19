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
use SymfonyBundles\RedisBundle\Redis\ClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET"})
     * @param ClientInterface $client
     * @return JsonResponse
     */
    public function index(ClientInterface $client)
    {
        $client->set('testKey', 'testValue');
        $retval = $client->get('testKey');

        return new JsonResponse(['redisTest' => $retval]);
    }
}