<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Brand::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
            ]
            );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
