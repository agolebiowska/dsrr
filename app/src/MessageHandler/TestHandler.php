<?php

namespace App\MessageHandler;

use App\Message\TestMessage;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;

class TestHandler
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function __invoke(TestMessage $message)
    {
        try {
            $this->client->set('test_key', $message->getContent());
        } catch (\Exception $e) {
            dump($e);die;
        }
    }
}