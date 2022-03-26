@extends('layouts/main')

@section('content')
    {{-- cart --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
            
            <div class="row shop-title-div">
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($products as $item)
                            <div class="col-md-12 order-item-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div>
                                                    <img src="{{ $item->image_url }}" alt="" height="100px" width="100px">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div style="display:flex;justify-content: space-between;">
                                                    <div class="p-2">
                                                        <div>
                                                            <h3>{{ $item->name }}</h3>
                                                        </div>
                                                        <div>
                                                            {{ $item->short_desc }}
                                                        </div>                                                        
                                                    </div>
                                                    <div class="p-2">
                                                        <div>
                                                            {{ Form::open(array('url' => '/remove-from-cart', 'method' => 'POST')) }}
                                                                @csrf
                                                                {{ Form::hidden('product_id', $item->id) }}
                                                                <button class="btn btn-danger btn-sm cursor-pointer">
                                                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                                    Remove
                                                                </button>
                                                            {{ Form::close() }}
                                                        </div>
                                                        <div class="mt-2">
                                                            ₹{{ $item->price }}
                                                        </div>
                                                        <div>
                                                            <strike>
                                                                ₹{{ $item->price_display }}
                                                            </strike>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 order-item-card">
                                <div class="card">
                                    <div class="card-body" style="display: flex;justify-content:center;">
                                        <h3>No items in cart</h3>
                                    </div>
                                </div>
                                <div class="mt-4" style="display: flex;justify-content:center;">
                                    <a class="btn btn-success" href="{{ url('/shop') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        Shop now
                                    </a>
                                </div>
                            </div>
                        @endforelse                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="cart-right-part-main">
                        <div>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Total Product(s)
                                </div>
                                <div>
                                    {{ count($products) }}
                                </div>
                            </div>
                            <hr>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Product total
                                </div>
                                <div>
                                    {{ number_format($total_amount,2) }}
                                </div>
                            </div>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Tax
                                </div>
                                <div>
                                    0.00
                                </div>
                            </div>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Shipping charge
                                </div>
                                <div>
                                    0.00
                                </div>
                            </div>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Discount
                                </div>
                                <div>
                                    0.00
                                </div>
                            </div>
                            <hr>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    <b>Total</b>
                                </div>
                                <div>
                                    <b>{{ number_format($total_amount,2) }}</b>
                                </div>
                            </div>

                            @if (count($products) > 0)                                                            
                                <div class="mt-2">
                                    {{ Form::open(array('url' => '/continue-order', 'method' => 'POST')) }}
                                        @csrf
                                        <button type="submit" class="cursor-pointer btn btn-success" style="width: 100%;">
                                            Continue
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </button>
                                    {{ Form::close() }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>            

        </div>
    </div>
@endsection