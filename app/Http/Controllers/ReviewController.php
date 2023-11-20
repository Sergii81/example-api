<?php

namespace App\Http\Controllers;

use App\Actions\Review\ReviewCreateAction;
use App\Actions\Review\ReviewDeleteAction;
use App\Actions\Review\ReviewUpdateAction;
use App\Dto\Review\ReviewCreateDto;
use App\Dto\Review\ReviewUpdateDto;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewDeleteRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * @param ReviewCreateRequest $request
     * @param ReviewCreateAction $action
     * @return Model
     */
    public function create(ReviewCreateRequest $request, ReviewCreateAction $action): Model
    {
        $dto = ReviewCreateDto::fromRequest($request);

        return $action->execute($dto);
    }

    /**
     * @param ReviewUpdateRequest $request
     * @param ReviewUpdateAction $action
     * @return Model|null
     */
    public function update(ReviewUpdateRequest $request, ReviewUpdateAction $action): ?Model
    {
        $id = $request->id;
        $dto = ReviewUpdateDto::fromRequest($request);

        return $action->execute($id, $dto);
    }

    /**
     * @param ReviewDeleteRequest $request
     * @param ReviewDeleteAction $action
     * @return bool|null
     */
    public function delete(ReviewDeleteRequest $request, ReviewDeleteAction $action): ?bool
    {
        return $action->execute($request->id);
    }
}
