<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TemplateRepositoryInterface;
use App\Models\Template;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TemplateRepository extends AbstractRepository implements TemplateRepositoryInterface
{

    public function getModel(): Model
    {
        return new Template();
    }

    /**
     * @return Collection
     */
    public function getAllOrderBy(): Collection
    {
        return $this->getQuery()->orderBy('id', 'desc')->get();
    }
}
