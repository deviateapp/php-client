<?php

namespace Deviate\Clients\Responses;

interface ApiPaginatedResponseInterface extends ApiResponseInterface
{
    public function results(): array;
    public function totalRecords(): int;
    public function currentPage(): int;
    public function perPage(): int;
    public function totalPages(): int;
}
