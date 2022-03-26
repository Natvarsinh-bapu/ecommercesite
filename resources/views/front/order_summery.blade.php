@extends('layouts/main')

@section('content')
    {{-- order summery --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Order Summery</h2>
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
                                    {{ Form::open(array('url' => '/place-order', 'method' => 'POST')) }}
                                        @csrf

                                        @if (Auth::user()->address != null)
                                            <hr>
                                            <div style="display: flex;justify-content:space-between;">
                                                <div>
                                                    <b>Your address :</b>
                                                    <div id="user_address_div">
                                                        {{ Auth::user()->address }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <hr>
                                        <div style="display: flex;justify-content:space-between;">
                                            <div>
                                                <h5>Address</h5>
                                            </div>
                                            @if (Auth::user()->address != null)
                                                <div id="use_above_address" class="btn btn-warning btn-sm mb-2 cursor-pointer">
                                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                    Use above address
                                                </div>
                                            @endif                                            
                                        </div>
                                        <div>
                                            <textarea class="form-control" rows="5" name="address" id="user_address" placeholder="Address" required style="color: #000"></textarea>
                                            @if (Session::has('address_error'))
                                                <div style="color: red;">{{ Session::get('address_error') }}</div>
                                            @endif
                                        </div>
                                        <hr>

                                        @if (Auth::user()->phone != null)
                                            <hr>
                                            <div style="display: flex;justify-content:space-between;">
                                                <div>
                                                    <b>Your mobile No. :</b>
                                                    <div id="user_phone_div">
                                                        {{ Auth::user()->phone }}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif                                                                                
                                        <div style="display: flex;justify-content:space-between;">
                                            <div>
                                                <h5>Mobile No.</h5>
                                            </div>
                                            @if (Auth::user()->phone != null)
                                                <div id="use_above_mobile" class="btn btn-warning btn-sm mb-2 cursor-pointer">
                                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                    Use above mobile No.
                                                </div>
                                            @endif                                            
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" name="phone" id="user_phone" placeholder="Mobile No." required style="color: #000">
                                            @if (Session::has('phone_error'))
                                                <div style="color: red;">{{ Session::get('phone_error') }}</div>
                                            @endif
                                        </div>
                                        <hr>

                                        <button type="submit" class="cursor-pointer btn btn-success" style="width: 100%;">
                                            Place order
                                            <i class="fa fa-check" aria-hidden="true"></i>
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