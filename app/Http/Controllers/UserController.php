<?php

namespace App\Http\Controllers;

use App\Actions\TotalLog\TotalLogCreateAction;
use App\Actions\User\UserCreateAction;
use App\Actions\User\UsersGetAllAction;
use App\Actions\User\UserGetAction;
use App\Actions\User\UserUpdateAction;
use App\Dto\User\UserCreateDto;
use App\Dto\User\UserUpdateDto;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserShowRequest;
use App\Http\Resources\Member\UserCollection;
use App\Http\Resources\Member\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(private readonly TotalLogCreateAction $createTotalLogAction)
    {
        $this->createTotalLogAction->execute();
    }

    /**
     * @param IndexRequest $request
     * @param UsersGetAllAction $action
     * @return UserCollection
     */
    public function index(IndexRequest $request, UsersGetAllAction $action): UserCollection
    {
        $page = $request->page ?? User::PAGE;
        $perPage = $request->perPage ?? User::PER_PAGE;

        return UserCollection::make($action->getAllWithPagination($page, $perPage));
    }

    /**
     * @param UserCreateRequest $request
     * @param UserCreateAction $action
     * @return UserResource
     */
    public function create(UserCreateRequest $request, UserCreateAction $action): UserResource
    {
        $dto = UserCreateDto::fromRequest($request);

        return UserResource::make($action->execute($dto));
    }

    /**
     * @throws UserNotFoundException
     */
    public function show(UserShowRequest $request, UserGetAction $action): UserResource
    {
        return UserResource::make($action->getByUuid($request->uuid));
    }

    /**
     * @param UpdateUserRequest $request
     * @param UserGetAction $userGetAction
     * @param UserUpdateAction $userUpdateAction
     * @return UserResource
     * @throws UserNotFoundException
     */
    public function update(
        UpdateUserRequest $request,
        UserGetAction $userGetAction,
        UserUpdateAction $userUpdateAction
    ): UserResource {
        $user = $userGetAction->getByUuid($request->uuid);
        $dto = UserUpdateDto::fromRequest($request);

        return UserResource::make($userUpdateAction->execute($user->id, $dto));
    }
}
