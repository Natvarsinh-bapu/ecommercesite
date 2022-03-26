@extends('layouts/main')

@section('content')
    {{-- cart --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Order </h2>
                        <h4>#{{ $order->order_id }}</h4>
                    </div>
                </div>
            </div>
            
            <div class="row shop-title-div mb-2">
                <div class="col-md-12">
                    <a href="{{ url('/my-orders') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($order->orders as $item)
                            <div class="col-md-12 order-item-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div>
                                                    <img src="{{ $item->product->image_url }}" alt="" height="100px" width="100px">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div style="display:flex;justify-content: space-between;">
                                                    <div class="p-2">
                                                        <div>
                                                            <h3>{{ $item->product->name }}</h3>
                                                        </div>
                                                        <div>
                                                            {{ $item->product->short_desc }}
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            {{ $item->product->description }}
                                                        </div>
                                                    </div>
                                                    <div class="p-2">                                                        
                                                        <div class="mt-2">
                                                            ₹{{ $item->product->price }}
                                                        </div>
                                                        <div>
                                                            <strike>
                                                                ₹{{ $item->product->price_display }}
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
                                    <div class="card-body">
                                        <h3>No items in cart</h3>
                                    </div>
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
                                    Order date
                                </div>
                                <div>
                                    {{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}
                                </div>
                            </div>
                            <hr>                           
                            <div>
                                <div class="mb-2">
                                    Shipping address :
                                </div>
                                <div>
                                    {{ $order->orders->first()->address }}
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="mb-2">
                                    Mobile No. :
                                </div>
                                <div>
                                    {{ $order->orders->first()->phone }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-right-part-main mt-4">
                        <div>
                            <div style="display: flex;justify-content:space-between;">
                                <div>
                                    Total Product(s)
                                </div>
                                <div>
                                    {{ $order->orders->count() }}
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
                        </div>                        
                    </div>

                    @if ($order->status == 'Cancelled')
                        <div class="btn btn-danger mt-2" style="width: 100%">
                            <i class="fa fa-times"></i> Cancelled
                        </div>
                    @endif                    
                    
                    @if ($order->status == null && cancel_order_button($order->created_at))
                        <div>
                            {{ Form::open(array('url' => url('/cancel-order'), 'method' => 'POST')) }}
                                @csrf
                                {{ Form::hidden('order_id', $order->id) }}
                                <button type="submit" class="btn btn-danger mt-2 cursor-pointer" style="width: 100%"><i class="fa fa-times"></i> Cancel order</button>
                            {{ Form::close() }}
                        </div>
                    @endif

                </div>
            </div>            

        </div>
    </div>
@endsection