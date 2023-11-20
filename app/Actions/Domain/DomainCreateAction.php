<?php

namespace App\Actions\Domain;

use App\Dto\Domain\DomainCreateDto;
use App\Exceptions\DomainExistException;
use App\Interfaces\Repositories\DomainRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DomainCreateAction
{
    /**
     * @param DomainRepositoryInterface $domainRepository
     */
    public function __construct(private readonly DomainRepositoryInterface $domainRepository)
    {
    }

    /**
     * @param DomainCreateDto $dto
     * @return Model
     * @throws DomainExistException
     */
    public function execute(DomainCreateDto $dto): Model
    {
        if ($this->domainRepository->getByDomain($dto->getDomain())) {

            throw new DomainExistException('The domain has already been taken.');
        }

        return $this->domainRepository->create($dto->toArray());
    }
}
