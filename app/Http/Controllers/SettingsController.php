<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SettingsController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'الإعدادات',
            'singular_name' => 'الإعداد'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Settings::first() == null)
            Settings::create(['conditions' => 'conditions', 'terms' => 'terms']);
        $settings = Settings::first();
        return view('dashboard.settings.index', compact('settings'))->with('public_content', $this->public_content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingsRequest  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request)
    {
        if (Settings::first() == null)
            Settings::create($request->validated());
        else
            Settings::first()->update($request->validated());
        return redirect()->route('settings.index');
    }
}
