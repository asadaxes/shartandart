<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createOrUpdate($request, $id = null)
    {
        Slider::updateorcreate(
            ['id' => $id],
            [
                'image' => Helper::uploadFile($request->file('image'), 'slider', isset($id) ? Slider::find($id)->image : null),
            ]
            );
    }
}
