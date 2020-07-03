<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ShoppingController extends Controller
{
    public function cartAdd()
    {
        // dd(request()->all());
        $product = Product::findOrFail(request('pdt_id'));

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => request('qty'),
            'price' => $product->price
        ]);
        // dd($cartItem);
        // dd(Cart::content());

        // Associate a model with the item.
        // rowId form documentation olimortimer/LaravelShoppingcart
        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product added to cart');


        return redirect()->route('cart');
    }

    public function cart()
    {
        // Cart::destroy();
        return view('cart');
    }

    public function cartDelete($rowId)
    {
        // dd($rowId);
        Cart::remove($rowId);

        Session::flash('success', 'Product removed from cart');

        return redirect()->back();
    }

    public function cartIncrement($id, $qty)
    {



        Cart::update($id, $qty + 1);

        Session::flash('success', 'Product qty updated');


        return redirect()->back();
    }

    public function cartDecrement($id, $qty)
    {

        Cart::update($id, $qty - 1);

        Session::flash('success', 'Product qty updated');


        return redirect()->back();
    }

    public function cartRapidAdd($id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product added to cart');

        return redirect()->route('cart');
    }
}
