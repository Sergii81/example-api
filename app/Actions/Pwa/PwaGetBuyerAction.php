<?php

namespace App\Actions\Pwa;

use App\Interfaces\Repositories\PwaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PwaGetBuyerAction
{

    public function __construct(public readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @param string $ownerId
     * @return Collection
     */
    public function getAll(string $ownerId): Collection
    {
        return $this->pwaRepository->getBuyerPwa($ownerId);
    }
}
