<?php

namespace App\Dto\Setting;

use App\Models\Setting;

class SettingSendImagesDto
{

    public function __construct(
        private array $icon,
        private array $images,
        private string $app_uuid
    ) {
    }

    /**
     * @param array $data
     * @param int $id
     * @return static
     */
    public static function fromArray(array $data, int $id): static
    {
        $setting = Setting::query()->where('id', '=', $id)->first();

        return new static(
            icon: self::makeIconArray($data),
            images: self::makeImagesArray($data),
            app_uuid: $setting->app_uuid
        );
    }

    /**
     * @return array
     */
    public function getIcon(): array
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @param array $data
     * @return array
     */
    public static function makeIconArray(array $data): array
    {
        $icon = [];
        if(! empty($data['app_icon']) && ! empty($data['app_icon_file'])) {
            $icon[$data['app_icon']] = $data['app_icon_file'];
        }

        return $icon;
    }

    /**
     * @param array $data
     * @return array
     */
    public static function makeImagesArray(array $data): array
    {
        $images = [];
        if(! empty($data['image_set_file_names']) && $data['image_set_files']) {
            $images = array_combine($data['image_set_file_names'], $data['image_set_files']);
        }

        return $images;
    }

    /**
     * @return string
     */
    public function getAppUuid(): string
    {
        return $this->app_uuid;
    }
}
