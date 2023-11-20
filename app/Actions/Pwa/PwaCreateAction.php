<?php

namespace App\Actions\Pwa;

use App\Actions\Review\ReviewCreateAction;
use App\Actions\Setting\SettingCreateAction;
use App\Dto\Pwa\PwaCreateDto;
use App\Interfaces\Repositories\PwaRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PwaCreateAction
{

    public function __construct(
        private readonly PwaRepositoryInterface $pwaRepository,
        private readonly SettingCreateAction $settingCreateAction,
        private readonly SetSubdomainToCloudflareAction $setSubdomainToCloudflareAction
    ) {
    }

    /**
     * @param PwaCreateDto $dto
     * @return Model
     * @throws \Exception
     */
    public function execute(PwaCreateDto $dto): Model
    {
        if ($this->setSubdomainToCloudflareAction->execute($dto->getSub())) {
            $data = [
                'app_uuid' => $dto->getAppUuid()
            ];
            $this->settingCreateAction->execute($data);

            return $this->pwaRepository->create($dto->toArray());
        }

        throw new \Exception('Subdomain not added');
    }
}
