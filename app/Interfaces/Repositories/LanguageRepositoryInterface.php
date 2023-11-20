<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface LanguageRepositoryInterface extends RepositoryInterface
{
    public function getByTemplate(int $templateId): Collection;
}
