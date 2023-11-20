<?php

namespace App\Actions\Template;

use App\Interfaces\Repositories\TemplateRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TemplateGetAllAction
{
    /**
     * @param TemplateRepositoryInterface $templateRepository
     */
    public function __construct(private readonly TemplateRepositoryInterface $templateRepository)
    {
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->templateRepository->getAllOrderBy();
    }
}
