<?php

namespace App\Actions\Review;

use App\Interfaces\Repositories\ReviewRepositoryInterface;

class ReviewDeleteAction
{
    /**
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(private readonly ReviewRepositoryInterface $reviewRepository)
    {
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function execute($id): ?bool
    {
        return $this->reviewRepository->delete($id);
    }
}
