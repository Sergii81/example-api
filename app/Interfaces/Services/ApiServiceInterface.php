<?php

namespace App\Interfaces\Services;

interface ApiServiceInterface
{
    public function getHeaders(): array;
    public function setHeaders(array $headers = []);
    public function getBody(): array;
    public function setBody(array $data);
    public function setOptions(array $headers = [], array $body = []);
    public function getOptions():array;
    public function setUrl(string $url = null);
    public function getUrl();
    public function requestCurl(string $method);
}
