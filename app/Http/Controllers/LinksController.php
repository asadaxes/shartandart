<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Brand;
use App\Models\Blog;

class LinksController extends Controller
{
    public function emi_tearms()
    {
        return view('front.links.emi_tearms');
    }

    public function shipping_delivery()
    {
        return view('front.links.shipping_delivery');
    }

    public function warranty_terms()
    {
        return view('front.links.warranty_terms');
    }

    public function refund_returns()
    {
        return view('front.links.refund_returns');
    }

    public function all_brands()
    {
        $brands = Brand::all();
        return view('front.links.all_brands', ['brands' => $brands]);
    }

    public function blogs()
    {
        $blogs = Blog::paginate(20);
        return view('front.blogs.blogs', ['blogs' => $blogs]);
    }

    public function blog_view()
    {
        try {
            $id = request()->query('id');
            
            $blogs = Blog::paginate(4);
            $blog = Blog::where('id', $id)->first();

            $data = [
                "blogs" => $blogs,
                "blog" => $blog
            ];

            return view('front.blogs.blog_view', $data);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('blogs');
        }
    }
}