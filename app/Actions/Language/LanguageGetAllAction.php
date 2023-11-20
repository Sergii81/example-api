<?php

namespace App\Actions\Language;

use App\Interfaces\Repositories\LanguageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LanguageGetAllAction
{

    public function __construct(private readonly LanguageRepositoryInterface $languageRepository)
    {
    }

    /**
     * @param int $templateId
     * @return Collection
     */
    public function getAllByTemplate(int $templateId): Collection
    {
        return $this->languageRepository->getByTemplate($templateId);
    }
}
