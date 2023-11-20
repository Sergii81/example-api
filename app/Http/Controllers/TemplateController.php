<?php

namespace App\Http\Controllers;

use App\Actions\Template\TemplateGetAllAction;
use App\Http\Resources\Template\TemplateCollection;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * @param TemplateGetAllAction $action
     * @return TemplateCollection
     */
    public function index(TemplateGetAllAction $action): TemplateCollection
    {
        return TemplateCollection::make($action->execute());
    }
}
