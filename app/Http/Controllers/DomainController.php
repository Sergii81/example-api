<?php

namespace App\Http\Controllers;

use App\Actions\Domain\DomainBanAction;
use App\Actions\Domain\DomainDeleteAction;
use App\Actions\Domain\DomainGetActiveAction;
use App\Actions\Domain\DomainsGetAllAction;
use App\Actions\Domain\DomainCreateAction;
use App\Actions\Domain\DomainUpdateAction;
use App\Actions\TotalLog\TotalLogCreateAction;
use App\Dto\Domain\DomainCreateDto;
use App\Dto\Domain\DomainUpdateDto;
use App\Exceptions\DomainExistException;
use App\Exceptions\DomainNotFoundException;
use App\Http\Requests\Domain\BanDomainRequest;
use App\Http\Requests\Domain\DomainCreateRequest;
use App\Http\Requests\Domain\DomainIdRequest;
use App\Http\Requests\Domain\DomainUpdateRequest;
use App\Http\Requests\IndexRequest;
use App\Http\Resources\Domain\DomainCollection;
use App\Http\Resources\Domain\DomainResource;
use App\Models\Domain;
use App\Services\DomainService;
use Illuminate\Http\JsonResponse;

class DomainController extends Controller
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
     * @param DomainsGetAllAction $action
     * @return DomainCollection
     */
    public function index(IndexRequest $request, DomainsGetAllAction $action): DomainCollection
    {
        $page = $request->page ?? Domain::PAGE;
        $perPage = $request->perPage ?? Domain::PER_PAGE;
        $domains = $action->getAllWithPagination($page, $perPage);

        return DomainCollection::make($domains);
    }

    /**
     * @param DomainCreateRequest $request
     * @param DomainCreateAction $action
     * @return DomainResource
     * @throws DomainExistException
     */
    public function create(DomainCreateRequest $request, DomainCreateAction $action): DomainResource
    {
        $dto = DomainCreateDto::fromRequest($request);

        return DomainResource::make($action->execute($dto));
    }

    /**
     * @param DomainUpdateRequest $request
     * @param DomainUpdateAction $action
     * @return DomainResource
     * @throws DomainNotFoundException
     */
    public function update(DomainUpdateRequest $request, DomainUpdateAction $action): DomainResource
    {
        $dto = DomainUpdateDto::fromRequest($request);
        $id = $request->id;

        return DomainResource::make($action->execute($id, $dto));
    }

    /**
     * @param DomainIdRequest $request
     * @param DomainDeleteAction $action
     * @return JsonResponse
     */
    public function delete(DomainIdRequest $request, DomainDeleteAction $action): JsonResponse
    {
        $action->execute($request->id);

        return response()->json('', 204);
    }

    /**
     * @param DomainGetActiveAction $action
     * @return DomainCollection
     */
    public function getActive(DomainGetActiveAction $action): DomainCollection
    {
        return DomainCollection::make($action->execute());
    }
}
