<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Blog::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'date' => $request->date,
                'expire_date' => $request->expire_date,
                'abilable' => $request->abilable,
                'image' => Helper::uploadFile($request->file('image'), 'blog', isset($id) ? Blog::find($id)->image : null),
            ]
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}