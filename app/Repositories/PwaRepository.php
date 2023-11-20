<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PwaRepositoryInterface;
use App\Models\Application;
use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PwaRepository extends AbstractRepository implements PwaRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Application();
    }

    /**
     * @param string $ownerId
     * @return Collection
     */
    public function getBuyerPwa(string $ownerId): Collection
    {
        return $this->getQuery()->where('owner_id', $ownerId)->get();
    }

    /**
     * @param string $ownerId
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getBuyerPwaWithPagination(string $ownerId, int $page, int $perPage): LengthAwarePaginator
    {
        $query = $this->getQuery()->where('owner_id', $ownerId);

        return $query->paginate(perPage: $perPage, page: $page);
    }
}
