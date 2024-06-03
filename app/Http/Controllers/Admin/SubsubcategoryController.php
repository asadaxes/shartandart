<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sub-sub-category.index', [
            'subsubcategories' => Subsubcategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub-sub-category.create', [
            'subcategories' => Subcategory::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        Subsubcategory::createOrUpdate($request);
        return redirect()->route('sub-sub-category.index')->with('success', 'Sub Sub Category created successfully');
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
        return view('admin.sub-sub-category.edit', [
            'subsubcategory' => Subsubcategory::find($id),
            'subcategories' => Subcategory::all(),
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
            'subcategory_id' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        
        Subsubcategory::createOrUpdate($request, $id);
        return redirect()->route('sub-sub-category.index')->with('success', 'Sub Sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subsubcategory::destroy($id);
        return redirect()->route('sub-sub-category.index')->with('success', 'Sub Sub Category deleted successfully');
    }
}