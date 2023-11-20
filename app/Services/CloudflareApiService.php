<?php

namespace App\Services;

use App\Interfaces\Services\CloudflareApiServiceInterface;
use App\Services\AbstractApiService;

class CloudflareApiService extends AbstractApiService implements CloudflareApiServiceInterface
{
    private const DNS_RECORDS_URL = '/dns_records';
    /**
     * @inheritDoc
     */
    public function setHeaders(array $headers = []): array
    {
        return $this->headers = [
            "Content-Type: application/json",
            "X-Auth-Email: " . config('cloudflare.cloudflare_api_email'),
            "X-Auth-Key: " . config('cloudflare.cloudflare_api_key')
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
        return $this->url = config('cloudflare.cloudflare_base_api_url') .
            config('cloudflare.cloudflare_zone_identifier') .
            self::DNS_RECORDS_URL;
    }
}
