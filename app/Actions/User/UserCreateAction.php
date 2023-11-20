<?php

namespace App\Actions\User;

use App\Dto\User\UserCreateDto;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserCreateAction
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param UserCreateDto $dto
     * @return Model
     */
    public function execute(UserCreateDto $dto): Model
    {
        return $this->userRepository->create($dto->toArray());
    }
}
