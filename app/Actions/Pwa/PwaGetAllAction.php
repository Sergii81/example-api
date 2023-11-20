<?php

namespace App\Actions\Pwa;

use App\Interfaces\Repositories\PwaRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PwaGetAllAction
{
    /**
     * @param PwaRepositoryInterface $pwaRepository
     */
    public function __construct(private readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->pwaRepository->getAll();
    }

    public function getAllWithPagination(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->pwaRepository->getPagination($page, $perPage);
    }
}
