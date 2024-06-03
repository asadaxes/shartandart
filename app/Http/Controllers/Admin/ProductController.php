<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Atribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'subsubcategories' => Subsubcategory::all(),
            'attributes' => Atribute::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $this->validate($request, [
            'name' => 'required',
//            'category_id' => 'required',
//            'brand_id' => 'required',
//            'product_status' => 'required',
//            'regular_price' => 'required',
//            'sale_price' => 'required',
//            'description' => 'required',
//            'attribute_id.*' => 'required',
//            'attributevalue.*' => 'required',
//            'specification.*' => 'required',
//            'specification_description.*' => 'required',
            ]);
        // return $request->all();
        Product::createProduct($request);
        return redirect()->route('product.index')->with('success', 'Product created Successfully...');
    }

    public function edit(string $id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'subsubcategories' => Subsubcategory::all(),
            'brands' => Brand::all(),
            'attributes' => Atribute::all(),
        ]);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_status' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'attribute_id.*' => 'required',
            'attributevalue.*' => 'required',
            'specification.*' => 'required',
            'specification_description.*' => 'required', ]);

        Product::updateProduct($request, $id);
        return redirect()->route('product.index')->with('success', 'Proodct Update Successfully....');
    }

    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('status', 'Product deleted successfully...');
    }

    public function getsubcategory(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function getsubsubcategory(Request $request)
    {
        $subsubcategories = Subsubcategory::where('subcategory_id', $request->subcategory_id)->get();
        return response()->json($subsubcategories);
    }
}
