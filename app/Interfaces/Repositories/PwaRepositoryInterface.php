<?php

namespace App\Interfaces\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PwaRepositoryInterface extends RepositoryInterface
{
    public function getBuyerPwa(string $ownerId): Collection;
    public function getBuyerPwaWithPagination(string $ownerId, int $page, int $perPage): LengthAwarePaginator;
}
