<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subcategory.index', [
            'subcategories' => Subcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategory.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        Subcategory::createOrUpdate($request);
        return redirect()->route('sub-category.index')->with('status', 'Subcategory created successfully');
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
        return view('admin.subcategory.edit', [
            'subcategory' => SubCategory::find($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        Subcategory::createOrUpdate($request, $id);
        return redirect()->route('sub-category.index')->with('status', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subcategory::destroy($id);
        return redirect()->route('sub-category.index')->with('status', 'Subcategory deleted successfully');
    }
}