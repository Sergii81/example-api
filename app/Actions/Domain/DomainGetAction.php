<?php

namespace App\Actions\Domain;

use App\Interfaces\Repositories\DomainRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DomainGetAction
{
    /**
     * @param DomainRepositoryInterface $domainRepository
     */
    public function __construct(private readonly DomainRepositoryInterface $domainRepository)
    {
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        return $this->domainRepository->getById($id);
    }
}
