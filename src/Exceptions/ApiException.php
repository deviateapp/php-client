<?php

namespace Deviate\Clients\Exceptions;

class ApiException extends AbstractApiException
{
    private $content;

    public function __construct(array $original)
    {
        $this->content = $original;

        parent::__construct($this->content['description']);

        $this->id     = $this->content['id'];
        $this->errors = $this->content['meta'];
    }

    public function getInternalCode(): int
    {
        return $this->content['code'];
    }

    protected function getHttpStatus(): int
    {
        return $this->content['status'];
    }

    protected function getTitle(): string
    {
        return $this->content['title'];
    }
}
