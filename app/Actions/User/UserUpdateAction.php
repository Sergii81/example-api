<?php

namespace App\Actions\User;

use App\Dto\User\UserUpdateDto;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserUpdateAction
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param int $id
     * @param UserUpdateDto $dto
     * @return Model|null
     */
    public function execute(int $id, UserUpdateDto $dto): ?Model
    {
        $data = $dto->toArray();

        if (empty($dto->getPassword())) {
            unset($data['password']);
        }

        return $this->userRepository->updateById($id, $data);
    }
}
