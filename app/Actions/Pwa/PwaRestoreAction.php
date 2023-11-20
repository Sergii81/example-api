<?php

namespace App\Actions\Pwa;

use App\Interfaces\Repositories\PwaRepositoryInterface;

class PwaRestoreAction
{
    /**
     * @param PwaRepositoryInterface $pwaRepository
     */
    public function __construct(public readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function execute(int $id): ?bool
    {
        return $this->pwaRepository->restore($id);
    }
}
