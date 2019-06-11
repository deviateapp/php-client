<?php

namespace Deviate\Clients\Responses;

class ApiPaginatedResponse extends ApiResponse implements ApiPaginatedResponseInterface
{
    public function results(): array
    {
        return $this->get('data', []);
    }

    public function currentPage(): int
    {
        return $this->get('meta.current_page', 1);
    }

    public function totalPages(): int
    {
        return $this->get('meta.total_pages', 1);
    }

    public function totalRecords(): int
    {
        return $this->get('meta.total_records', 0);
    }

    public function perPage(): int
    {
        return $this->get('meta.per_page', 20);
    }
}
