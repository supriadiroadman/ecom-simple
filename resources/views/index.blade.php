@extends('layouts.front')

@section('page')
<div class="container">
    <div class="row pt120">
        <div class="books-grid">

            <div class="row mb30">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <a href="{{ route('product.single', $product) }}">
                                <div class="books-item-thumb">
                                    <img src="{{ asset('storage/uploads/'.$product->image) }}"alt="book">
                                </div>
                            </a>

                            <div class="books-item-info">
                                <a href="{{ route('product.single', $product) }}">
                                    <h5 class="books-title">{{ $product->name }}</h5>
                                </a>

                                <div class="books-price">Rp {{ $product->price }}</div>
                            </div>

                            <a href="{{ route('cart.rapid.add', ['id'=>$product->id]) }}"
                                class="btn btn-small btn--dark add">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row pb120">

                <div class="col-lg-12">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
    @endsection
