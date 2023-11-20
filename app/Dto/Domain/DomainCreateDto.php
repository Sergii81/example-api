<?php

namespace App\Dto\Domain;

use Illuminate\Http\Request;

class DomainCreateDto
{

    public function __construct(
        private string $domain,
        private ?int $status,
        private ?string $date_create
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        return new static(
            domain: $request->domain,
            status: $request->status ?? 1,
            date_create: date('Y:m:d H:i:s')
        );
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getDateCreate(): ?string
    {
        return $this->date_create;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
