<?php

namespace App\Http\Controllers;

use App\Actions\Setting\SettingGetAction;
use App\Actions\Setting\SettingUpdateAction;
use App\Dto\Setting\SettingUpdateDto;
use App\Http\Requests\Setting\SettingShowRequest;
use App\Http\Requests\Setting\SettingUpdateRequest;
use App\Http\Resources\Setting\SettingResource;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @param SettingShowRequest $request
     * @param SettingGetAction $action
     * @return SettingResource
     */
    public function show(SettingShowRequest $request, SettingGetAction $action): SettingResource
    {
        return SettingResource::make($action->execute($request->id));
    }

    /**
     * @param SettingUpdateRequest $request
     * @param SettingUpdateAction $action
     * @return SettingResource
     */
    public function update(SettingUpdateRequest $request, SettingUpdateAction $action): SettingResource
    {
        $id = $request->id;
        $dto = SettingUpdateDto::fromRequest($request);

        return SettingResource::make($action->execute($id, $dto));
    }
}
