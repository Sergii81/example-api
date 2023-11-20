<?php

namespace App\Http\Controllers;

use App\Actions\Pwa\PwaGetBuyerAction;
use App\Actions\Pwa\PwaCreateAction;
use App\Actions\Pwa\PwaGetAction;
use App\Actions\Pwa\PwaGetAllAction;
use App\Actions\Pwa\PwaUpdateAction;
use App\Actions\TotalLog\TotalLogCreateAction;
use App\Dto\Pwa\PwaCreateDto;
use App\Dto\Pwa\PwaUpdateDto;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\Pwa\GetBuyerPwaRequest;
use App\Http\Requests\Pwa\PwaCreateRequest;
use App\Http\Requests\Pwa\PwaShowRequest;
use App\Http\Requests\Pwa\PwaUpdateRequest;
use App\Http\Resources\Pwa\PwaCollection;
use App\Http\Resources\Pwa\PwaResource;
use App\Models\Application;
use Illuminate\Contracts\Container\BindingResolutionException;

class PwaController extends Controller
{
    /**
     * @param TotalLogCreateAction $createTotalLogAction
     */
    public function __construct(private readonly TotalLogCreateAction $createTotalLogAction)
    {
        $this->createTotalLogAction->execute();
    }

    /**
     * @param IndexRequest $request
     * @param PwaGetAllAction $action
     * @return PwaCollection
     */
    public function index(IndexRequest $request, PwaGetAllAction $action): PwaCollection
    {
        $page = $request->page ?? Application::PAGE;
        $perPage = $request->perPage ?? Application::PER_PAGE;

        return PwaCollection::make($action->getAllWithPagination($page, $perPage));
    }

    /**
     * @param PwaCreateRequest $request
     * @param PwaCreateAction $action
     * @return PwaResource
     * @throws BindingResolutionException
     */
    public function create(PwaCreateRequest $request, PwaCreateAction $action): PwaResource
    {
        $dto = PwaCreateDto::fromRequest($request);

        return PwaResource::make($action->execute($dto));
    }

    /**
     * @param PwaShowRequest $request
     * @param PwaGetAction $action
     * @return PwaResource
     */
    public function show(PwaShowRequest $request, PwaGetAction $action): PwaResource
    {
        return PwaResource::make($action->execute($request->id));
    }

    /**
     * @param PwaUpdateRequest $request
     * @param PwaUpdateAction $action
     * @return PwaResource
     */
    public function update(PwaUpdateRequest $request, PwaUpdateAction $action): PwaResource
    {
        $id = $request->id;
        $dto = PwaUpdateDto::fromRequest($request);

        return PwaResource::make($action->execute($id, $dto));
    }

    /**
     * @param GetBuyerPwaRequest $request
     * @param PwaGetBuyerAction $action
     * @return PwaCollection
     */
    public function getBuyerPwa(GetBuyerPwaRequest $request, PwaGetBuyerAction $action): PwaCollection
    {
        return PwaCollection::make($action->getAll($request->ownerId));
    }
}
