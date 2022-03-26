@extends('layouts/main')

@section('content')
    {{-- my orders --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>My Orders</h2>
                    </div>
                </div>
            </div>
            
            <div class="row shop-title-div">
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($orders as $item)
                            <div class="col-md-12 mb-2">
                                <a href="{{ url('/my-orders/'. $item->order_id) }}">
                                    <div class="card {{ $item->status == 'Cancelled' ? 'order-cancelled' : '' }}">
                                        <div class="card-body">
                                            <div class="row" style="align-items: center;">
                                                <div class="col-md-2">
                                                    <div style="display:flex;justify-content: space-between;">
                                                        <div class="p-2 order-item-count">
                                                            <div>
                                                                <h3 style="color: #fff">{{ $loop->iteration }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <h3>#{{ $item->order_id }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    @if ($item->status == 'Cancelled')                                                                                                                            
                                                        <div style="margin-left: 30%">
                                                            <h5 style="color:#721c24">Cancelled</h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <h5>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <h4>{{ $item->orders->count() }} <span style="font-size: 16px">{{ $item->orders->count() > 1 ? "Items" : "Item" }}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>  
                            </div>                          
                        @empty
                            <div class="col-md-12 order-item-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>No orders available</h3>
                                    </div>
                                </div>
                            </div>
                        @endforelse                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="display: flex;justify-content:right;">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection