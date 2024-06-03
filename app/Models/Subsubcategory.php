<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Subsubcategory::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'topbar_heading' => $request->topbar_heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'image' => Helper::uploadFile($request->file('image'), 'sub-sub-category', isset($id) ? Subsubcategory::find($id)->image : null),
            ]
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}