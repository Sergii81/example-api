<?php

namespace App\Actions\Review;

use App\Dto\Review\ReviewSendImageDto;
use App\Interfaces\Services\PwaApiServiceInterface;
use Illuminate\Support\Facades\Log;

class ReviewSendImagesAction
{

    public function __construct(
        private readonly PwaApiServiceInterface $apiService)
    {
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function execute(array $data): mixed
    {
        try {
            $url = config('pwa.base_pwa_api_url');
            if(env('APP_ENV') == 'local') {
                $url .= "api/";
            }
            $url .= $this->apiService::COMMENT_ICON_URL;
            $dto = ReviewSendImageDto::fromArray($data);
            $this->apiService->setUrl($url);
            $this->apiService->setHeaders();
            $this->apiService->setBody($dto->toArray());

            return $this->apiService->requestCurl($this->apiService::METHOD_POST);
        } catch (\Exception $exception) {
            if(env('APP_ENV') == 'local')
            {
                dd($exception->getMessage());
            }
            Log::error('Send Comment icon error - ' . $exception->getMessage());

            return false;
        }
    }
}
