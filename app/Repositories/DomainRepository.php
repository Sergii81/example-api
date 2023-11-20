<?php

namespace App\Repositories;

use App\Interfaces\Repositories\DomainRepositoryInterface;
use App\Models\Domain;
use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DomainRepository extends AbstractRepository implements DomainRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Domain();
    }

    /**
     * @param string $domain
     * @return Model|null
     */
    public function getByDomain(string $domain): ?Model
    {
        return $this->getQuery()->where('domain', $domain)->first();
    }

    /**
     * @return Collection
     */
    public function getActive(): Collection
    {
        return $this->getQuery()->where('status', '=',1)->get();
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getActiveWithPagination(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->getQuery()->where('status', '=',1)->paginate(perPage: $perPage, page: $page);
    }
}
