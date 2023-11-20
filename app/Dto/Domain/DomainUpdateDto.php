<?php

namespace App\Dto\Domain;

use Illuminate\Http\Request;

class DomainUpdateDto
{

    public function __construct(
        private ?string $domain,
        private ?int $status,
        private ?string $date_ban,
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        return new static(
            domain: $request->domain ?? null,
            status: $request->status ?? null,
            date_ban: $request->status == 0 ? date('Y:m:d H:i:s') : null
        );
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
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
