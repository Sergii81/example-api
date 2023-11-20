<?php

namespace App\Actions\Whitepage;

use App\Interfaces\Repositories\WhitepageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class WhitepageGetAllAction
{

    public function __construct(private readonly WhitepageRepositoryInterface $whitepageRepository)
    {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->whitepageRepository->getAll();
    }
}
