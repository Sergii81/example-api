<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new User();
    }

    /**
     * @param $uuid
     * @return Model|null
     */
    public function getByUuid($uuid): ?Model
    {
        return $this->getQuery()->where('uuid', $uuid)->first();
    }
}
