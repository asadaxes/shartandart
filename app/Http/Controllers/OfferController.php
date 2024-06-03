<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return view('front.offer.index', [
            'offers'=> Blog::orderBy('id', 'desc')->get()
        ]);
    }

    public function details($id)
    {
        return view('front.offer.details', [
            'offer'=> Blog::find($id)
        ]);
    }
}