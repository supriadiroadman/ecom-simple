<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function cartCheckout()
    {
        if (Cart::content()->count() == 0) {
            Session::flash('info', 'Your cart is still empty, do some shopping');
            return redirect()->back();
        }

        return view('checkout');
    }

    public function cartPay()
    {
        // dd(request()->all());

        Stripe::setApiKey('sk_test_51H0KBbDVo4zr3WNt3rXfKz4ycQrcgn4p1JvKaG0u9MYbM883HcBbhjBcX4b3oICHyLLH29WIfMmcbHNV1ZxETVdn00rjtV3EdX');

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'IDR',
            'description' => "E-ecom Supriadi",
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase successfully. wait for our email');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
