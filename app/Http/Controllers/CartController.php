<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
//        return $cart;
        return view('frontend.cart.index', [
            'carts' => $cart,
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
//        return $request;
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $product = Product::find($productId);
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->sale_price ? $product->sale_price : $product->reqular_price,
                "photo" => $product->image,
            ];
        }
        Session::put('cart', $cart);
//        Session::forget('cart');
        return response()->json($cart);
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
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
        }
        Session::put('cart', $cart);
        return response()->json(['success' => 'Cart updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cartremove(Request $request)
    {
        $productId = $request->product_id;
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }
        Session::put('cart', $cart);
        return response()->json(['success' => 'Product removed from cart successfully!']);
    }

    public function cartadd(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $product = Product::find($productId);
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->sale_price ? $product->sale_price : $product->reqular_price,
                "photo" => $product->image,
            ];
        }
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
}
