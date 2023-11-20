<?php

namespace App\Actions\Domain;

use App\Interfaces\Repositories\DomainRepositoryInterface;

class DomainDeleteAction
{
    /**
     * @param DomainRepositoryInterface $domainRepository
     */
    public function __construct(private readonly DomainRepositoryInterface $domainRepository)
    {
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function execute(int $id): ?bool
    {
        return $this->domainRepository->delete($id);
    }
}
