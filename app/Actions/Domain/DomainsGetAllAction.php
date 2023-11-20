<?php

namespace App\Actions\Domain;

use App\Interfaces\Repositories\DomainRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DomainsGetAllAction
{

    public function __construct(private readonly DomainRepositoryInterface $domainRepository)
    {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->domainRepository->getAll();
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPagination(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->domainRepository->getPagination($page, $perPage);
    }
}
