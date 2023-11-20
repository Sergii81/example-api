<?php

namespace App\Actions\Review;

use App\Dto\Review\ReviewCreateDto;
use App\Interfaces\Repositories\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ReviewCreateAction
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
     * @param ReviewCreateDto $dto
     * @return Model
     */
    public function execute(ReviewCreateDto $dto): Model
    {
        $this->reviewSendCommentImagesAction->execute($dto->toArray());

        return $this->reviewRepository->create($dto->toArray());
    }
}
