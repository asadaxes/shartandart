<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Setting::updateorcreate(
            ['id' => $id],
            [
                'logo' => Helper::uploadFile($request->file('logo'), 'Setting', isset($id) ? Setting::find($id)->logo : null),
                // 'logo' => $request->logo,
                'logo_name' => $request->logo_name,
                'fb_url' => $request->fb_url,
                'twitter_url' => $request->twitter_url,
                'insta_url' => $request->insta_url,
                'pinta_url' => $request->pinta_url,
                'linkdien_url' => $request->linkdien_url,
                'youtube_url' => $request->youtube_url,
                'whatsapp_url' => $request->whatsapp_url,
                'mobile_number1' => $request->mobile_number1,
                'mobile_number2' => $request->mobile_number2,
                'mobile_number3' => $request->mobile_number3,
                'mobile_number4' => $request->mobile_number4,
                'email' => $request->email,
                // 'slug' => Str::slug($request->title),
                'address1' => $request->address1,
                'address2' => $request->address2,

            ]
            );
    }
}
