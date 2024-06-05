<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class GeoBDController extends Controller
{
    public function get_district( $id)
    {
//        return 'saarowar';
        $districts=District::where('division_id',$id)->get();
        return response()->json($districts);
//        return json_encode($districts);


    }
}
