<?php

namespace App\Actions\Domain;

use App\Actions\Pwa\PwaDeleteAction;
use App\Actions\Pwa\PwaRestoreAction;
use App\Dto\Domain\DomainUpdateDto;
use App\Exceptions\DomainNotFoundException;
use App\Interfaces\Repositories\DomainRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DomainUpdateAction
{

    public function __construct(
        private readonly DomainRepositoryInterface $domainRepository,
        private readonly PwaDeleteAction $pwaDeleteAction,
        private readonly PwaRestoreAction $pwaRestoreAction
    )
    {
    }

    /**
     * @throws DomainNotFoundException
     */
    public function execute(int $id, DomainUpdateDto $dto): ?Model
    {
        $domain = $this->domainRepository->getById($id);
        if (! $domain) {
            throw new DomainNotFoundException('Domain not found');
        }
        $status = $domain->status;
        $this->domainRepository->updateById($id, $dto->toArray());
        if ($dto->getStatus() == 0) {
            $pwa = $domain->pwa;
            foreach ($pwa as $item) {
                $this->pwaDeleteAction->execute($item->id);
            }
        } elseif ($dto->getStatus() == 1 && $status == 0) {
            $pwa = $domain->pwa()->onlyTrashed()->get();
            foreach ($pwa as $item) {
                $this->pwaRestoreAction->execute($item->id);
            }
        }

        return $this->domainRepository->getById($id);
    }
}
