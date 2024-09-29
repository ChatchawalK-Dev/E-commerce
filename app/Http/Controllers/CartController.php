<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return redirect()->route('shop.index')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        // If the product is already in the cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // If the product is not in the cart, add it
            $cart[$id] = [
                'name' => $shop->name,
                'quantity' => 1,
                'price' => $shop->price,
                'image' => $shop->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        return view('cart');
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Item removed successfully');
    }

    public function update(Request $request, $id)
        {
            $cart = session()->get('cart');

            if(isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity; // อัปเดตจำนวนสินค้า
                session()->put('cart', $cart); // เก็บข้อมูลตะกร้าสินค้าใน session ใหม่
            }

            return redirect()->back()->with('success', 'Cart updated successfully!');
        }
}

