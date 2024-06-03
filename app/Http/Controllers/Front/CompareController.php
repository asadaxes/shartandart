<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compare = Session::get('compare', []);
        return view('front.compare.index', [
            'compares' => $compare,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $product = Product::find($productId);
        $compare = Session::get('compare', []);
        if (isset($compare[$productId])) {
            $compare[$productId]['quantity'] += $quantity;
        } else {
            $compare[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->sale_price ? $product->sale_price : $product->reqular_price,
                "photo" => $product->image,
            ];
        }
        Session::put('compare', $compare);

        return response()->json($compare);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function compareremove(Request $request)
    {
        $productId = $request->product_id;
        $compare = Session::get('compare', []);
        if (isset($compare[$productId])) {
            unset($compare[$productId]);
        }
        Session::put('compare', $compare);
        return response()->json(['success' => 'Product removed from compare successfully!']);
    }
}
