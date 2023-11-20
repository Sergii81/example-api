<?php

namespace App\Services;

use App\Interfaces\Services\PwaApiServiceInterface;
use App\Services\AbstractApiService;

class PwaApiService extends AbstractApiService implements PwaApiServiceInterface
{
    /**
     * @param array $headers
     * @inheritDoc
     */
    public function setHeaders(array $headers = []): array
    {
        return $this->headers = [
            //'Authorization' => $this->authKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    /**
     * @inheritDoc
     */
    public function setBody(array $data = []): array
    {
        return $this->body = $data;
    }

    /**
     * @param string|null $url
     * @return string|null
     */
    public function setUrl(string $url = null): ?string
    {
        return $this->url = $url;
    }
}
