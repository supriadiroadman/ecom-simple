@extends('layouts.front')

@section('page')
<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <div class="order">
                        <h2 class="h1 order-title text-center align-center">Your Order</h2>
                        <form action="#" method="post" class="cart-main">
                            <table class="shop_table cart">
                                <thead class="cart-product-wrap-title-main">
                                    <tr>
                                        <th class="product-thumbnail">Product</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach(Cart::content() as $product)
                                        <tr class="cart_item">

                                            <td class="product-thumbnail">

                                                <div class="cart-product__item">
                                                    <div class="cart-product-content">
                                                        <h5 class="cart-product-title">{{ $product->name }}</h5>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="product-quantity">

                                                <div class="quantity">
                                                    x {{ $product->qty }}
                                                </div>

                                            </td>

                                            <td class="product-subtotal">
                                                <h5 class="total amount">Rp {{ $product->total() }}</h5>
                                            </td>

                                        </tr>
                                    @endforeach

                                    <tr class="cart_item total">

                                        <td class="product-thumbnail">


                                            <div class="cart-product-content">
                                                <h5 class="cart-product-title">Total:</h5>
                                            </div>


                                        </td>

                                        <td class="product-quantity">

                                        </td>

                                        <td class="product-subtotal">
                                            <h5 class="total amount">Rp {{ number_format(Cart::total()) }}</h5>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="cheque">

                                <div class="logos">
                                    <a href="#" class="logos-item">
                                        <img src="{{ asset('template/img/visa.png') }}"
                                            alt="Visa">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{ asset('template/img/mastercard.png') }}"
                                            alt="MasterCard">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{ asset('template/img/discover.png') }}"
                                            alt="DISCOVER">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{ asset('template/img/amex.png') }}"
                                            alt="Amex">
                                    </a>

                                    <span style="float: right;">
                                        <form action="{{ route('cart.pay') }}" method="POST">
                                            @csrf
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="pk_test_51H0KBbDVo4zr3WNtZdWjK1gDNc34xzVrsOb3nW1JeqKrP7DH3DFGvHqFkyu8dZ5UOdz4qc7gq9PqkRE8qZfpWij400Zop71jcq"
                                                data-amount="{{ Cart::total()*100 }}" data-name="Supriadi e-com"
                                                data-description="Harga terjangkau"
                                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                data-locale="auto" data-zip-code="true">
                                            </script>
                                        </form>
                                    </span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
