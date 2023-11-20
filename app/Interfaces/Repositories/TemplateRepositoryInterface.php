<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TemplateRepositoryInterface extends RepositoryInterface
{
    public function getAllOrderBy(): Collection;
}
