<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribute extends Model
{
    use HasFactory;

    protected $garded = [];

    public static function createAtribute($request)
    {
        $atribute = new Atribute();
        $atribute->name = $request->name;
        $atribute->save();

        if ($request->value) {
            foreach ($request->value as $value) {
                $atributevalue = new Atributevalue();
                $atributevalue->value = $value;
                $atributevalue->atribute_id = $atribute->id;
                $atributevalue->save();
            }
        }
    }

    public static function updateAtribute($request, $id)
    {
        $atribute = Atribute::find($id);
        $atribute->name = $request->name;
        $atribute->save();

        Atributevalue::where('atribute_id', $id)->delete();
        if ($request->value) {
            foreach ($request->value as $value) {
                $atributevalue = new AtributeValue();
                $atributevalue->value = $value;
                $atributevalue->atribute_id = $atribute->id;
                $atributevalue->save();
            }
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function atributevalues()
    {
        return $this->hasMany(Atributevalue::class);
    }

    public function productatributes()
    {
        return $this->hasMany(Productatribute::class, 'productattributes');
    }
}
