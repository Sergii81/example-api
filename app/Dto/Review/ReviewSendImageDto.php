<?php

namespace App\Dto\Review;

class ReviewSendImageDto
{
    /**
     * @param string|null $fileName
     * @param string|null $file
     */
    public function __construct(
        private ?string $fileName,
        private ?string $file
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            fileName: $data['icon'] ?: null,
            file: $data['file'] ?: null
        );
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
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
     * @return mixed|null
     */
    private static function makeBody(array $data): mixed
    {
        $body = [];
        if (!empty($data['icon'] && !empty($data['file']))) {
            $body[$data['icon']] = $data['file'];

            return $body;
        } else {

            return null;
        }
    }
}
