<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.setting.index', [
            'settings' => Setting::all()
        ]);
    }


    public function create()
    {
        return view('admin.setting.create', [
            'settings' => Setting::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        // ]);

        Setting::createOrUpdate($request);
        return redirect()->route('setting.index')->with('status', 'Setting created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.setting.edit', [
            'setting' => Setting::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Setting::createOrUpdate($request, $id);
        return redirect()->route('setting.index')->with('status', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Setting::destroy($id);
        return redirect()->route('setting.index')->with('status', 'Setting deleted successfully');
    }
}
