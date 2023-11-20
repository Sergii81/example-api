<?php

namespace App\Actions\User;

use App\Exceptions\UserNotFoundException;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserGetAction
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function getById($id): ?Model
    {
        return $this->userRepository->getById($id);
    }

    /**
     * @param $uuid
     * @return Model|null
     * @throws UserNotFoundException
     */
    public function getByUuid($uuid): ?Model
    {
        $user = $this->userRepository->getByUuid($uuid);
        if (! $user) {
            throw new UserNotFoundException('User not found', 404);
        }

        return $user;
    }
}
