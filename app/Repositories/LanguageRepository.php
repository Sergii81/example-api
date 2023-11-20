<?php

namespace App\Repositories;

use App\Interfaces\Repositories\LanguageRepositoryInterface;
use App\Models\Language;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LanguageRepository extends AbstractRepository implements LanguageRepositoryInterface
{

    public function getModel(): Model
    {
        return new Language();
    }

    /**
     * @param int $templateId
     * @return Collection
     */
    public function getByTemplate(int $templateId): Collection
    {
        return $this->getQuery()->where('template_id', '=', $templateId)->get();
    }
}
