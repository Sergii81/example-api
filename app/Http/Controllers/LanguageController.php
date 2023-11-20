<?php

namespace App\Http\Controllers;

use App\Actions\Language\LanguageGetAllAction;
use App\Http\Resources\Language\LanguageCollection;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param LanguageGetAllAction $action
     * @return LanguageCollection
     */
    public function getByTemplate(LanguageGetAllAction $action): LanguageCollection
    {
        $templateId = 2;

        return LanguageCollection::make($action->getAllByTemplate($templateId));
    }
}
