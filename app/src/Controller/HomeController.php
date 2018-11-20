<?php

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_send_message", methods={"GET"})
     * @param MessageBusInterface $bus
     * @return JsonResponse
     */
    public function sendMessage(MessageBusInterface $bus)
    {
        $bus->dispatch(new TestMessage("test content of test message"));

        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/key", name="app_get_key", methods={"GET"})
     * @param ClientInterface $client
     * @return JsonResponse
     */
    public function getKey(ClientInterface $client)
    {
        $testKeyMadeByHandler = $client->get('test_key');

        return new JsonResponse(['test key made by handler' => $testKeyMadeByHandler]);
    }
}