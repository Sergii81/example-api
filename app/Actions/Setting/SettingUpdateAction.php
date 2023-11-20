<?php

namespace App\Actions\Setting;

use App\Dto\Setting\SettingSendImagesDto;
use App\Dto\Setting\SettingUpdateDto;
use App\Interfaces\Repositories\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SettingUpdateAction
{
    /**
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(
        private readonly SettingRepositoryInterface $settingRepository,
        private readonly SettingSendImagesAction $settingSendImagesAction
    ) {
    }

    /**
     * @param int $id
     * @param SettingUpdateDto $dto
     * @return Model|null
     */
    public function execute(int $id, SettingUpdateDto $dto): ?Model
    {
        $this->settingSendImagesAction->execute($dto->toArray(), $id);

        return $this->settingRepository->updateById($id, $dto->toArray());
    }
}
