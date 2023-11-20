<?php

namespace App\Actions\Pwa;

use App\Interfaces\Repositories\PwaRepositoryInterface;

class PwaDeleteAction
{
    /**
     * @param PwaRepositoryInterface $pwaRepository
     */
    public function __construct(private readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function execute($id): ?bool
    {
        return $this->pwaRepository->delete($id);
    }
}
