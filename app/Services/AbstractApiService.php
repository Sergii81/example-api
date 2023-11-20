<?php

namespace App\Services;

use App\Interfaces\Services\ApiServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\StreamInterface;

abstract class AbstractApiService implements ApiServiceInterface
{
    public const METHOD_POST = 'POST';
    public const METHOD_GET = 'GET';
    public const METHOD_PATCH = 'PATCH';

    public array $headers = [];
    public array $body = [];
    public array $options = [];
    public string $url = '';


    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    abstract public function setHeaders(array $headers = []): array;

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param array $data
     * @return array
     */
    abstract public function setBody(array $data = []): array;

    public function requestCurl(string $method): bool|string
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($this->getBody()),
            CURLOPT_HTTPHEADER => $this->getHeaders(),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error($err);
            if (env('APP_ENV') == 'local') {
                dd($err);
            }
            return false;
        } else {

            return $response;
        }
    }

    /**
     * @param array $headers
     * @param array $body
     * @return array
     */
    public function setOptions(array $headers = [], array $body = []): array
    {
        $this->options['headers'] = $headers;

        if (! empty($body)) {
            $this->options['body'] = json_encode($body);
        }

        return $this->options;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    abstract public function setUrl(string $url = null);
}
