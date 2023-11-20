<?php

namespace App\Actions\Pwa;

use App\Interfaces\Services\CloudflareApiServiceInterface;

class SetSubdomainToCloudflareAction
{
    /**
     * @param CloudflareApiServiceInterface $apiService
     */
    public function __construct(private readonly CloudflareApiServiceInterface $apiService)
    {
    }

    public function execute(string $subdomain)
    {
        $data = [
            "content" => config('cloudflare.cloudflare_ip_address'),
            "name" => $subdomain,
            "proxied" => true,
            "type" => "A",
            "comment" => "Sub domain",
            "tags" => [],
            "ttl" => 1
        ];
        $this->apiService->setUrl();
        $this->apiService->setHeaders();
        $this->apiService->setBody($data);

        $result = $this->apiService->requestCurl($this->apiService::METHOD_POST);

        return empty($result['errors']);
    }
}
