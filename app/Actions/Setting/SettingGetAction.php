<?php

namespace App\Actions\Setting;

use App\Interfaces\Repositories\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SettingGetAction
{
    /**
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(private readonly SettingRepositoryInterface $settingRepository)
    {
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function execute(int $id): ?Model
    {
        return $this->settingRepository->getById($id);
    }
}
