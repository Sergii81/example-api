<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SettingRepositoryInterface;
use App\Models\Setting;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class SettingRepository extends AbstractRepository implements SettingRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Setting();
    }
}
