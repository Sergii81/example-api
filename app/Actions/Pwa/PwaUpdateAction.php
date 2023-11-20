<?php

namespace App\Actions\Pwa;

use App\Dto\Pwa\PwaUpdateDto;
use App\Interfaces\Repositories\PwaRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PwaUpdateAction
{

    public function __construct(private readonly PwaRepositoryInterface $pwaRepository)
    {
    }

    /**
     * @param int $id
     * @param PwaUpdateDto $dto
     * @return Model|null
     */
    public function execute(int $id, PwaUpdateDto $dto): ?Model
    {
        return $this->pwaRepository->updateById($id, $dto->toArray());
    }
}
