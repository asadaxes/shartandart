<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index', [
            'brands' => Brand::all()
        ]);
    }


    public function create()
    {
        return view('admin.brand.create', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Brand::createOrUpdate($request);
        return redirect()->route('brand.index')->with('status', 'Brand created successfully');
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
        return view('admin.brand.edit', [
            'brand' => Brand::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        Brand::createOrUpdate($request, $id);
        return redirect()->route('brand.index')->with('status', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::destroy($id);
        return redirect()->route('brand.index')->with('status', 'Brand deleted successfully');
    }
}