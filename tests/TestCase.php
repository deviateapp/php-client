<?php

namespace Deviate\Clients\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected $transport;

    protected $requests = [];

    protected $mock;

    protected function setUp()
    {
        parent::setUp();

        $this->mock = new MockHandler([
            new Response(200, [], json_encode(['foo' => 'bar'])),
        ]);

        $history = Middleware::history($this->requests);
        $stack   = HandlerStack::create($this->mock);
        $stack->push($history);

        $this->transport = new Client([
            'handler' => $stack,
        ]);
    }

    protected function assertCalled(string $method, string $uri, array $payload = []): void
    {
        /** @var Request $request */
        $request = end($this->requests)['request'];

        $this->assertEquals($method, $request->getMethod());
        $this->assertEquals($uri, $request->getRequestTarget());

        $this->assertEquals(json_encode($payload), (string) $request->getBody());
    }
}
