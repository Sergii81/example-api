<?php

namespace App\Actions\Setting;

use App\Interfaces\Repositories\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SettingCreateAction
{

    public function __construct(private readonly SettingRepositoryInterface $settingRepository)
    {
    }

    /**
     * @param array $data
     * @return Model
     */
    public function execute(array $data): Model
    {
        return $this->settingRepository->create($data);
    }
}
