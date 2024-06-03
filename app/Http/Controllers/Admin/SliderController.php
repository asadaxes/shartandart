<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => Slider::all()
        ]);
    }

    public function create()
    {

        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        Slider::createOrUpdate($request);
        return redirect()->route('slider.index')->with('status', 'Slider created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return view('admin.slider.edit', [
            'slider' => Slider::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        
        Slider::createOrUpdate($request, $id);
        return redirect()->route('slider.index')->with('status', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::destroy($id);
        return redirect()->route('slider.index')->with('status', 'Slider deleted successfully');
    }
}