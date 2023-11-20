<?php

namespace App\Interfaces\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface DomainRepositoryInterface extends RepositoryInterface
{
    public function getByDomain(string $domain): ?Model;

    public function getActive(): Collection;
}
