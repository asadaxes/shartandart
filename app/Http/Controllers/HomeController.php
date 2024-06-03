<?php

namespace App\Http\Controllers;

use App\Models\Atribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productatribute;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        return view  ('frontend.home.home',[
            "products"=>Product::latest()->take(6)->get()
        ]);
//        return view("front-old.home.index", [
//            "categories" => Category::all(),
//            'subcategories' => Subcategory::where('fetured_subcategory', 'on')->get(),
//            "products" => Product::all(),
//            'sliders' => Slider::all(),
//        ]);
    }

    public function productdetail($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cartproduct = $cart[$id];
        } else {
            $cartproduct = null;
        }

        $product = Product::find($id);

        if (!$product) {
            // Product not found, redirect to home page
            return redirect()->route('home');
        }

        return view("front.product.detail", [
            "categories" => Category::all(),
            "product" => $product,
            'relatedproducts' => Product::where('category_id', $product->category_id)->take(5)->get(),
            'cartproduct' => $cartproduct,
        ]);
    }

    public function productcategory($id)
    {
        return view('frontend.pages.all_product');
        return view("frontend.product.category", [
            'category' => Category::find($id),
            "products" => Product::where("category_id", $id)->paginate(10),
            'brands' => Brand::whereHas('products', function ($query) use ($id) {
                $query->where('category_id', $id);
            })->get(),
            'productatributes' => Productatribute::whereHas('product', function ($query) use ($id) {
                $query->where('category_id', $id);
            })->distinct()
            ->pluck('atribute_id')
            ->toArray(),
            'atributes' => Atribute::all(),
        ]);
    }

    public function subcategoryProduct($id)
    {
        return view("front.product.sub-category", [
            // 'subsubcategory' => Subsubcategory::find($id),
            'subcategory' => Subcategory::find($id),
            "products" => Product::where("subcategory_id", $id)->paginate(10),
            'brands' => Brand::whereHas('products', function ($query) use ($id) {
                $query->where('subcategory_id', $id);
            })->get(),
            'productatributes' => Productatribute::whereHas('product', function ($query) use ($id) {
                $query->where('subcategory_id', $id);
            })->distinct()
            ->pluck('atribute_id')
            ->toArray(),
            'atributes' => Atribute::all(),
        ]);
    }

    public function subsubcategoryProduct($id)
    {
        return view("front.product.subsub-category", [
            "subsubcategory" => Subsubcategory::find($id),
            "products"=> Product::where("subsubcategory_id", $id)->paginate(10),
            'brands' => Brand::whereHas('products', function ($query) use ($id) {
                $query->where('subsubcategory_id', $id);
            })->get(),
            'productatributes' => Productatribute::whereHas('product', function ($query) use ($id) {
                $query->where('subsubcategory_id', $id);
            })->distinct()
            ->pluck('atribute_id')
            ->toArray(),
            'atributes' => Atribute::all(),
        ]);
    }
}
