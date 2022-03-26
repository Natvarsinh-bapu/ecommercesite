@extends('admin.layouts.main')

@section('content')
    <style>
        .order-item-card {
            margin-bottom: 10px;
        }

        .cart-right-part-main {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px;
            padding: 10px;
        }

        .order-cancelled {
            background-color: #f8d7da;
        }
    </style>

    {{-- OVERVIEW --}}
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Order #{{ $order->order_id }}</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>
        <div class="panel-body">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8">
                    <div style="display: flex;justify-content:space-between;">
                        <div>
                            <a class="btn btn-warning" href="{{ url('admin/orders') }}"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4">                    
                    @if ($order->status == 'Cancelled')
                        <div class="alert alert-danger" role="alert" style="width: 300px;"><b>Cancelled</b></div>
                    @endif                        
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($order->orders as $item)
                            <div class="col-md-12 order-item-card">
                                <div style="border:1px solid rgba(0, 0, 0, .125); border-radius:5px;" >
                                    <div style="padding-bottom: 20px;">
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
                                                    <div style="padding: 20px;">                                                        
                                                        <div>
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
                    <div class="cart-right-part-main" style="margin-bottom: 10px;">
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

                    <div class="cart-right-part-main">
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
                </div>
            </div>  
        </div>
    </div>
    {{-- END OVERVIEW --}}
@endsection