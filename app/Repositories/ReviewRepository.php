<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ReviewRepositoryInterface;
use App\Models\Review;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class ReviewRepository extends AbstractRepository implements ReviewRepositoryInterface
{

    public function getModel(): Model
    {
        return new Review();
    }
}
