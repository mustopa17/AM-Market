<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return CartItem::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'image_path' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        return CartItem::create($request->all());
    }

    public function show(CartItem $cartItem)
    {
        return $cartItem;
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update($request->all());
        return $cartItem;
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json(null, 204);
    }
}