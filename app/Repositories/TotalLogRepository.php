<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TotalLogRepositoryInterface;
use App\Models\TotalLog;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class TotalLogRepository extends AbstractRepository implements TotalLogRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new TotalLog();
    }
}
