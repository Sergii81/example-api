<?php

namespace App\Actions\Pwa;

use App\Interfaces\Repositories\PwaRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PwaGetAction
{

    public function __construct(private readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function execute(int $id): ?Model
    {
        return $this->pwaRepository->getById($id);
    }
}
