<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'blogs' => Blog::all()
        ]);
    }

    public function create()
    {
        $categories=Category::all();
        $users=User::all();
        return view('admin.blog.create',compact('categories','users'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'date' => 'required',
            'expire_date' => 'required',
            'abilable' => 'required'
        ]);

        Blog::createOrUpdate($request);
        return redirect()->route('blog.index')->with('status', 'Blog created successfully');
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
        return view('admin.blog.edit', [
            'blog' => Blog::find($id),
            'categories' => Category::all(),
            'users'=> User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'date' => 'required',
            'expire_date' => 'required',
            'abilable' => 'required'
        ]);

        Blog::createOrUpdate($request, $id);
        return redirect()->route('blog.index')->with('status', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect()->route('blog.index')->with('status', 'Blog deleted successfully');
    }
}