<?php

namespace App\Repositories;

use App\Interfaces\Repositories\WhitepageRepositoryInterface;
use App\Models\Whitepage;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class WhitepageRepository extends AbstractRepository implements WhitepageRepositoryInterface
{

    public function getModel(): Model
    {
        return new Whitepage();
    }
}
