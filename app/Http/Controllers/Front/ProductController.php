<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categoryList(Request $request)
    {
        $category = $request->id;
        $product = Product::where('category_id', $category)->get();
        return response()->json($product);
    }

    public function subcategoryList(Request $request)
    {
        $subcategory = $request->id;
        $product = Product::where('subcategory_id', $subcategory)->get();
        return response()->json($product);
    }

    public function categorythreecol(Request $request)
    {
        $category = $request->id;
        $product = Product::where('category_id', $category)->get();
        return response()->json($product);
    }

    public function subsubcategoryList(Request $request)
    {
        $subsubcategory = $request->id;
        $product = Product::where('subsubcategory_id', $subsubcategory)->get();
        return response()->json($product);
    }

    public function productsfilter(Request $request)
    {
        $min = (float) str_replace('TK', '', $request->min_price);
        $max = (float) str_replace('TK', '', $request->max_price);
        $brands = $request->input('brands', []);
        $productatributes = $request->input('productatributes', []);
        $query  = Product::query()->whereBetween('sale_price', [$min, $max])->where('category_id', $request->category_id);
        if (!empty($brands)) {
            $query->whereIn('brand_id', $brands);
        }
        if (!empty($productatributes)) {
            $query->whereHas('productatributes', function ($q) use ($productatributes) {
                $q->whereIn('atributevalue_id', $productatributes);
            });
        }
        $product = $query->get();

        return response()->json($product);
    }

    public function productsubfilter(Request $request)
    {
        $min = (float) str_replace('TK', '', $request->min_price);
        $max = (float) str_replace('TK', '', $request->max_price);
        $brands = $request->input('brands', []);
        $productatributes = $request->input('productatributes', []);
        $query  = Product::query()->whereBetween('sale_price', [$min, $max])->where('subcategory_id', $request->subcategory_id);
        if (!empty($brands)) {
            $query->whereIn('brand_id', $brands);
        }
        if (!empty($productatributes)) {
            $query->whereHas('productatributes', function ($q) use ($productatributes) {
                $q->whereIn('atributevalue_id', $productatributes);
            });
        }
        $product = $query->get();

        return response()->json($product);
    }

    public function productsubsubfilter(Request $request)
    {
        $min = (float) str_replace('TK', '', $request->min_price);
        $max = (float) str_replace('TK', '', $request->max_price);
        $brands = $request->input('brands', []);
        $productatributes = $request->input('productatributes', []);
        $query  = Product::query()->whereBetween('sale_price', [$min, $max])->where('subsubcategory_id', $request->subsubcategory_id);
        if (!empty($brands)) {
            $query->whereIn('brand_id', $brands);
        }
        if (!empty($productatributes)) {
            $query->whereHas('productatributes', function ($q) use ($productatributes) {
                $q->whereIn('atributevalue_id', $productatributes);
            });
        }
        $product = $query->get();

        return response()->json($product);
    }

    public function searchproduct(Request $request)
    {
        $search = $request->input('query');
        $products = Product::where('name', 'like', $search.'%')->get();
        return response()->json($products);
    }
}