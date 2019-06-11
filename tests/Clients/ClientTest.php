<?php

namespace Deviate\Clients\Tests\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Exceptions\AbstractApiException;
use Deviate\Clients\Exceptions\ApiException;
use Deviate\Clients\Responses\ApiResponse;
use Deviate\Clients\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use function json_encode;

class ClientTest extends TestCase
{
    /** @test */
    public function it_can_transform_results_into_api_response_objects()
    {
        $client = new class ($this->transport) extends AbstractClient {
            public function doSomething() {
                return $this->call('GET', '/test');
            }
        };

        $response = $client->doSomething();

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /** @test */
    public function it_throws_an_api_exception_if_an_error_is_returned_from_the_api()
    {
        $this->mock = new MockHandler([
            RequestException::create(
                new Request('GET', '/test'),
                new Response(400, [], json_encode($this->makeResponseException()->toArray()))
            )
        ]);

        $history = Middleware::history($this->requests);
        $stack   = HandlerStack::create($this->mock);
        $stack->push($history);

        $this->transport = new Client([
            'handler' => $stack,
        ]);

        $client = new class ($this->transport) extends AbstractClient {
            public function doSomething() {
                return $this->call('GET', '/test');
            }
        };

        $this->expectException(ApiException::class);

        $client->doSomething();
    }

    protected function makeResponseException(): AbstractApiException
    {
        return new class extends AbstractApiException {
            protected $errors = ['foo' => 'bar'];

            public function __construct()
            {
                parent::__construct('This is a test exception message');
            }

            protected function getInternalCode(): int
            {
                return 1000;
            }

            protected function getHttpStatus(): int
            {
                return 400;
            }

            protected function getTitle(): string
            {
                return 'Test Exception';
            }
        };
    }
}
