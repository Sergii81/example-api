<?php

namespace App\Dto\Setting;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingUpdateDto
{

    /**
     * @param string|null $app_name
     * @param string|null $app_author
     * @param string|null $app_icon
     * @param string|null $image_set
     * @param float|null $app_rating
     * @param string|null $fb_continue
     * @param string|null $about
     * @param string|null $app_icon_file
     * @param array|null $image_set_files
     * @param array|null $image_set_file_names
     */
    public function __construct(
        private ?string $app_name,
        private ?string $app_author,
        private ?string $app_icon,
        private ?string $image_set,
        private ?float $app_rating,
        private ?string $fb_continue,
        private ?string $about,
        private ?string $app_icon_file,
        private ?array $image_set_files,
        private ?array $image_set_file_names,
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        /** @var Setting $setting */
        $setting = Setting::query()->where('id', $request->id)->first();

        return new static(
            app_name: $request->app_name ?: $setting->app_name,
            app_author: $request->app_author ?: $setting->app_author,
            app_icon: $request->app_icon ?: $setting->app_icon,
            image_set: $request->image_set ?: $setting->image_set,
            app_rating: $request->app_rating ?: $setting->app_rating,
            fb_continue: $request->fb_continue ?: $setting->fb_continue,
            about: $request->about ?: $setting->about,
            app_icon_file: $request->app_icon_file ?: null,
            image_set_files: $request->image_set_files ?: null,
            image_set_file_names: $request->image_set_file_names ?: null
        );
    }

    /**
     * @return string|null
     */
    public function getAbout(): ?string
    {
        return $this->about;
    }

    /**
     * @return string|null
     */
    public function getAppAuthor(): ?string
    {
        return $this->app_author;
    }

    /**
     * @return string|null
     */
    public function getAppIcon(): ?string
    {
        return $this->app_icon;
    }

    /**
     * @return string|null
     */
    public function getAppName(): ?string
    {
        return $this->app_name;
    }

    /**
     * @return float|null
     */
    public function getAppRating(): ?float
    {
        return $this->app_rating;
    }

    /**
     * @return string|null
     */
    public function getFbContinue(): ?string
    {
        return $this->fb_continue;
    }

    /**
     * @return string|null
     */
    public function getImageSet(): ?string
    {
        return $this->image_set;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return array|null
     */
    public function getImageSetFiles(): ?array
    {
        return $this->image_set_files;
    }

    /**
     * @return string|null
     */
    public function getAppIconFile(): ?string
    {
        return $this->app_icon_file;
    }

    /**
     * @return array|null
     */
    public function getImageSetFileNames(): ?array
    {
        return $this->image_set_file_names;
    }
}
