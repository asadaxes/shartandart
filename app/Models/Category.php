<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Category::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'description' => $request->description,
                'topbar_heading' => $request->topbar_heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'image' => Helper::uploadFile($request->file('image'), 'category', isset($id) ? Category::find($id)->image : null),
            ]
            );
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function subsubcategories()
    {
        return $this->hasManyThrough(Subsubcategory::class, Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
