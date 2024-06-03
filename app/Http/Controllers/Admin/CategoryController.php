<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        Category::createOrUpdate($request);
        return redirect()->route('category.index')->with('status', 'Category created successfully');
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
        return view('admin.category.edit', [
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'topbar_heading' => 'required',
            'topbar_description' => 'required',
            'bottom_description' => 'required',
            'meta_title' => 'required',
            'meta_url' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        
        Category::createOrUpdate($request, $id);
        return redirect()->route('category.index')->with('status', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('status', 'Category deleted successfully');
    }
}