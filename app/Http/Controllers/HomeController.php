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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        return view  ('frontend.home.home',[
            "sliders"=>Slider::latest()->get(),
            "categories"=>Category::latest()->orderBy('id','DESC')->take(3)->get(),
            "mens"=>Product::where('category_id','2')->latest()->take(20)->get(),
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
//        return $id;
//        return view('frontend.product.detail');
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

        return view("frontend.product.detail", [
            "categories" => Category::all(),
            "product" => $product,
            'relatedproducts' => Product::where('category_id', $product->category_id)->take(5)->get(),
            'cartproduct' => $cartproduct,
        ]);
    }

    public function productcategory($id,$subid=null)
    {
//        return $subid;
//        return view('frontend.pages.all_product');
//        return Category::find($id);

        if (!empty($subid)){
            $products = Product::where("subcategory_id", $subid)->latest()->paginate(10);
        }else{
            $products = Product::where("category_id", $id)->latest()->paginate(10);
        }
        return view("frontend.pages.all_product", [
            'categorys' => Category::find($id),
            'subcategories'=>Subcategory::where('category_id',$id)->get(),

            "products" => $products,
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

    public function subcategoryProduct(Request $request)
    {
//        return $request;
        return view("frontend.pages.all_product", [
            'categorys' => Category::find($request->category_id),
//            'subcategories'=>Subcategory::where('category_id',$id)->get(),
            "products" => Product::where("subcategory_id", $request->sub_category)->latest()->paginate(10),
//            'brands' => Brand::whereHas('products', function ($query) use ($id) {
//                $query->where('category_id', $id);
//            })->get(),
//            'productatributes' => Productatribute::whereHas('product', function ($query) use ($id) {
//                $query->where('category_id', $id);
//            })->distinct()
//                ->pluck('atribute_id')
//                ->toArray(),
//            'atributes' => Atribute::all(),
        ]);
//        return view("front.product.sub-category", [
//            // 'subsubcategory' => Subsubcategory::find($id),
//            'subcategory' => Subcategory::find($id),
//            "products" => Product::where("subcategory_id", $id)->paginate(10),
//            'brands' => Brand::whereHas('products', function ($query) use ($id) {
//                $query->where('subcategory_id', $id);
//            })->get(),
//            'productatributes' => Productatribute::whereHas('product', function ($query) use ($id) {
//                $query->where('subcategory_id', $id);
//            })->distinct()
//            ->pluck('atribute_id')
//            ->toArray(),
//            'atributes' => Atribute::all(),
//        ]);
    }

    public function subsubcategoryProduct(Request $request)
    {
//        return $request;
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
