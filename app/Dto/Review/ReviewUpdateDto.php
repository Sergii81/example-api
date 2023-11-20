<?php

namespace App\Dto\Review;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewUpdateDto
{
    /**
     * @param string|null $icon
     * @param string|null $name
     * @param float|null $stars
     * @param string|null $about
     */
    public function __construct(
        private ?string $icon,
        private ?string $name,
        private ?float $stars,
        private ?string $about
    ) {
    }

    public static function fromRequest(Request $request)
    {
        /** @var Review $review */
        $review = Review::query()->where('id', $request->id)->first();

        return new self(
            icon: $request->icon ?: $review->icon,
            name: $request->name ?: $review->name,
            stars: $request->stars ?: $review->stars,
            about: $request->about ?: $review->about,
        );
    }

    /**
     * @return float|null
     */
    public function getStars(): ?float
    {
        return $this->stars;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string|null
     */
    public function getAbout(): ?string
    {
        return $this->about;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
