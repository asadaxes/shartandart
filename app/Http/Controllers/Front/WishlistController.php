<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Session::get('wishlist', []);
        return view('front.wishlist.index', [
            'wishlists' => $wishlist,
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
        $wishlist = Session::get('wishlist', []);
        if (isset($wishlist[$productId])) {
            $wishlist[$productId]['quantity'] += $quantity;
        } else {
            $wishlist[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->sale_price ? $product->sale_price : $product->reqular_price,
                "sale_price" => $product->sale_price,
                "regular_price" => $product->regular_price,
                "photo" => $product->image,
            ];
        }
        Session::put('wishlist', $wishlist);

        return response()->json($wishlist);
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

    public function wishlistremove(Request $request)
    {
        $productId = $request->product_id;
        $wishlist = Session::get('wishlist', []);
        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
        }
        Session::put('wishlist', $wishlist);
        return response()->json(['success' => 'Product removed from wishlist successfully!']);
    }
}
