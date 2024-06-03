<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productatribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function atribute()
    {
        return $this->belongsTo(Atribute::class);
    }

    public function atributevalue()
    {
        return $this->belongsTo(Atributevalue::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
