<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getByUuid($uuid): ?Model;
}
