@extends('layouts/main')

@section('content')
    {{-- product info --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Product info</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="m-2">
                        <div>
                            <img src="{{ $product->image_url }}" alt="">
                        </div>
                        <div>
                            <h4>{{ $product->name }}</h4>
                            <div>
                                <div class="product_price">₹{{ $product->price }}</div>
                                <span class="price-cancelled">₹{{ $product->price_display }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin:auto;">
                    <div class="owl-carousel owl-theme product-info-carousel">
                        @forelse ($product->images as $item)
                            <div class="item">
                                <img src="{{ $item->image_url }}" alt="">
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-3">
                        <div>
                            <label for="">{{ $product->short_desc }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-3">
                        <div>
                            <label for="">{{ $product->description }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="p-2" style="display: flex;justify-content:right;">                        
                        <button data-id="{{ $product->id }}" type="button" class="cursor-pointer btn btn-outline-warning _add_to_cart">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            Add to cart
                        </button>
                        {{ Form::open(array('url' => '/buy-now', 'method' => 'POST')) }}
                            @csrf
                            {{ Form::hidden('product_id', $product->id) }}
                            <button type="submit" class="cursor-pointer btn btn-outline-success ml-1">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Buy now
                            </button>
                        {{ Form::close() }}                        
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection