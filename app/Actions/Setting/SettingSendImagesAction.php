<?php

namespace App\Actions\Setting;

use App\Dto\Review\ReviewSendImageDto;
use App\Dto\Setting\SettingSendImagesDto;
use App\Interfaces\Services\PwaApiServiceInterface;
use Illuminate\Support\Facades\Log;

class SettingSendImagesAction
{

    public function __construct(private readonly PwaApiServiceInterface $apiService)
    {
    }

    /**
     * @param array $data
     * @param int $id
     * @return false
     */
    public function execute(array $data, int $id): bool
    {
        try {
            $url = config('pwa.base_pwa_api_url');
            if(env('APP_ENV') == 'local') {
                $url .= "api/";
            }
            $url .= $this->apiService::SETTING_IMG_URL;
            $dto = SettingSendImagesDto::fromArray($data, $id);
            $this->apiService->setUrl($url);
            $this->apiService->setHeaders();
            $this->apiService->setBody($dto->toArray());

            return $this->apiService->requestCurl($this->apiService::METHOD_POST);
        } catch (\Exception $exception) {
            if(env('APP_ENV') == 'local')
            {
                dd($exception->getMessage());
            }
            Log::error('Send Setting images error - ' . $exception->getMessage());

            return false;
        }
    }
}
