<?php

namespace App\Services;

use App\Interfaces\Services\OnesignalCreateAppApiServiceInterface;
use App\Services\AbstractApiService;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

class OnesignalCreateAppApiService extends AbstractApiService implements OnesignalCreateAppApiServiceInterface
{
    /**
     * @param string|null $url
     * @return Repository|Application|\Illuminate\Foundation\Application|mixed
     */
    public function setUrl(string $url = null): mixed
    {
       return $this->url = config('onesignal.api_url');
    }

    public function setHeaders(array $headers = []): array
    {
        return $this->headers = [
            'Authorization: Basic ' . config('onesignal.user_auth_key'),
            'Content-Type: application/json',
            'accept: text/plain',
        ];
    }

    public function setBody(array $data = []): array
    {

        $this->body = [
            'name' => $data['subdomain'] . $data['domain'],
            'organization_id' => config('onesignal.organization_id'),
            'chrome_web_origin' => 'https://' . $data['subdomain'] .'.'. $data['domain'],
            'site_name' => $data['subdomain'] . ' ' . $data['domain'],
            'additional_data_is_root_payload' => false
        ];

        return $this->body;
    }
}
