<?php

namespace App\Actions\Onesignal;

use App\Interfaces\Services\OnesignalCreateAppApiServiceInterface;

class OnesignalCreateAppAction
{
    /**
     * @param OnesignalCreateAppApiServiceInterface $onesignalCreateAppApiService
     */
    public function __construct(public readonly OnesignalCreateAppApiServiceInterface $onesignalCreateAppApiService)
    {
    }

    public function execute(array $data)
    {
        $this->onesignalCreateAppApiService->setUrl();
        $this->onesignalCreateAppApiService->setOptions(
            $this->onesignalCreateAppApiService->setHeaders(),
            $this->onesignalCreateAppApiService->setBody($data)
        );

        $response = $this->onesignalCreateAppApiService->requestCurl($this->onesignalCreateAppApiService::METHOD_POST);
        $response = json_decode($response);

        if (isset ($response->errors)) {

            throw new \Exception($response->errors[0]);
        }

        return $response;
    }
}
