<?php

namespace App\Actions\Review;

use App\Dto\Review\ReviewUpdateDto;
use App\Interfaces\Repositories\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ReviewUpdateAction
{
    /**
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(
        private readonly ReviewRepositoryInterface $reviewRepository,
        private readonly ReviewSendImagesAction $reviewSendCommentImagesAction
    ) {
    }

    /**
     * @param int $id
     * @param ReviewUpdateDto $dto
     * @return Model|null
     */
    public function execute(int $id, ReviewUpdateDto $dto): ?Model
    {
        $this->reviewSendCommentImagesAction->execute($dto->toArray());

        return $this->reviewRepository->updateById($id, $dto->toArray());
    }
}
