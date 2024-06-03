<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Subcategory::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'topbar_heading' => $request->topbar_heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'fetured_subcategory' => $request->fetured_subcategory,
                'image' => Helper::uploadFile($request->file('image'), 'subcategory', isset($id) ? Subcategory::find($id)->image : null),
            ]
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(Subsubcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}