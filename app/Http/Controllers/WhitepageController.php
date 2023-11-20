<?php

namespace App\Http\Controllers;

use App\Actions\Whitepage\WhitepageGetAllAction;
use App\Http\Resources\Whitepage\WhitpageCollection;
use Illuminate\Http\Request;

class WhitepageController extends Controller
{
    /**
     * @param WhitepageGetAllAction $action
     * @return WhitpageCollection
     */
    public function index(WhitepageGetAllAction $action): WhitpageCollection
    {
        return WhitpageCollection::make($action->getAll());
    }
}
