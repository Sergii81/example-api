<?php

namespace App\Actions\Domain;

use App\Interfaces\Repositories\DomainRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DomainGetActiveAction
{

    public function __construct(private readonly DomainRepositoryInterface $domainRepository)
    {
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->domainRepository->getActive();
    }
}
