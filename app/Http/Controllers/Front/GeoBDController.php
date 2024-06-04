<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeoBDController extends Controller
{
    public function get_district(Request $request)
    {
        return response()->json('$subcategories');


    }
}
