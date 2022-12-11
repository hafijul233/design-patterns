<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return Setting::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSettingRequest $request
     * @return Setting
     */
    public function store(StoreSettingRequest $request)
    {
        return Setting::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return Setting
     */
    public function show(Setting $setting)
    {
        return $setting;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSettingRequest $request
     * @param Setting $setting
     * @return Setting
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        $setting->refresh();

        return $setting;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return bool
     */
    public function destroy(Setting $setting)
    {
        return (bool)$setting->delete();
    }
}
