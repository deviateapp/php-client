<?php

namespace Deviate\Clients\Tests\Exceptions;

use Deviate\Clients\Exceptions\AbstractApiException;
use Deviate\Clients\Tests\TestCase;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

class ApiExceptionTest extends TestCase
{
    /** @test */
    public function it_can_convert_an_exception_to_an_array()
    {
        $exception = $this->makeException();

        $response = $exception->toArray();

        $this->assertRegExp(sprintf('/%s/', Uuid::VALID_PATTERN), $response['id']);
        $this->assertEquals(1000, $response['code']);
        $this->assertEquals(400, $response['status']);
        $this->assertEquals('Test Exception', $response['title']);
        $this->assertEquals('This is a test exception message', $response['description']);
        $this->assertEquals(['foo' => 'bar'], $response['meta']);
    }

    /** @test */
    public function it_can_convert_an_exception_to_a_response()
    {
        $exception = $this->makeException();

        $response = $exception->toResponse();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(400, $response->getStatusCode());
    }

    protected function makeException(): AbstractApiException
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
