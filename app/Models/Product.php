<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createProduct($request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->product_status = $request->product_status;
        $product->product_code = Helper::serialnumber();
        $product->brand_id = $request->brand_id;
        $product->key_features = $request->key_features;
        $product->meta_title = $request->meta_title;
        $product->meta_url = $request->meta_url;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->topbar_heading = $request->topbar_heading;
        $product->topbar_description = $request->topbar_description;
        $product->bottom_description = $request->bottom_description;
        $product->image = Helper::uploadFile($request->file('image'), 'product');
        $product->image_2 = Helper::uploadFile($request->file('image_2'), 'product');
        $product->image_3 = Helper::uploadFile($request->file('image_3'), 'product');
        $product->image_4 = Helper::uploadFile($request->file('image_4'), 'product');
        $product->save();

        if ($request->attribute_id) {
            foreach ($request->attribute_id as $key => $value) {
                $productattribute = new Productatribute();
                $productattribute->product_id = $product->id;
                $productattribute->atribute_id = $value;
                $productattribute->atributevalue_id = $request->attributevalue[$key];
                $productattribute->save();
            }
        }

        if ($request->specification) {
            foreach ($request->specification as $key => $value) {
                $specification = new Specification();
                $specification->product_id = $product->id;
                $specification->specification = $value;
                $specification->specification_description = $request->specification_description[$key];
                $specification->save();
            }
        }
    }

    public static function updateProduct($request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->product_status = $request->product_status;
        $product->key_features = $request->key_features;
        $product->meta_title = $request->meta_title;
        $product->meta_url = $request->meta_url;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->topbar_heading = $request->topbar_heading;
        $product->topbar_description = $request->topbar_description;
        $product->bottom_description = $request->bottom_description;
        if ($request->file('image')) {
            $product->image = Helper::uploadFile($request->file('image'), 'product');
        }
        else {
            $product->image = $product->image;
        }
        if ($request->file('image_2')) {
            $product->image_2 = Helper::uploadFile($request->file('image_2'), 'product');
        }
        else {
            $product->image_2 = $product->image_2;
        }
        if ($request->file('image_3')) {
            $product->image_3 = Helper::uploadFile($request->file('image_3'), 'product');
        }
        else {
            $product->image_3 = $product->image_3;
        }
        if ($request->file('image_4')) {
            $product->image_4 = Helper::uploadFile($request->file('image_4'), 'product');
        }
        else {
            $product->image_4 = $product->image_4;
        }
        $product->save();

        Productatribute::where('product_id', $id)->delete();
        if ($request->attribute_id) {
            foreach ($request->attribute_id as $key => $value) {
                $productattribute = new Productatribute();
                $productattribute->product_id = $product->id;
                $productattribute->atribute_id = $value;
                $productattribute->atributevalue_id = $request->attributevalue[$key];
                $productattribute->save();
            }
        }

        Specification::where('product_id', $id)->delete();
        if ($request->specification) {
            foreach ($request->specification as $key => $value) {
                $specification = new Specification();
                $specification->product_id = $product->id;
                $specification->specification = $value;
                $specification->specification_description = $request->specification_description[$key];
                $specification->save();
            }
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function subsubcategory()
    {
        return $this->belongsTo(Subsubcategory::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productatributes()
    {
        return $this->hasMany(Productatribute::class);
    }


}
