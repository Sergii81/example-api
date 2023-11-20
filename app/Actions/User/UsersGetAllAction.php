<?php

namespace App\Actions\User;

use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UsersGetAllAction
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->userRepository->getAll();
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPagination(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->userRepository->getPagination($page, $perPage);
    }
}
