<?php

namespace App\Dto\Review;

use Illuminate\Http\Request;

class ReviewCreateDto
{
    /**
     * @param string $app_uuid
     * @param string|null $icon
     * @param string|null $name
     * @param float|null $stars
     * @param string|null $about
     */
    public function __construct(
        private string $app_uuid,
        private ?string $icon,
        private ?string $name,
        private ?float $stars,
        private ?string $about,
        private ?string $file
    ) {
    }

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): ReviewCreateDto
    {
        return new self(
            app_uuid: $request->app_uuid,
            icon: $request->icon ?? null,
            name: $request->name ?? null,
            stars: $request->stars ?? null,
            about: $request->about ?? null,
            file: $request->file ?? null,
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
     * @return string
     */
    public function getAppUuid(): string
    {
        return $this->app_uuid;
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

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }
}
