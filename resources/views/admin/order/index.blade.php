@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Orders</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>
        <div class="panel-body">

            @forelse ($orders as $item)
                <a href="{{ url('/admin/orders/'. $item->order_id) }}" style="text-decoration: none;color:#000;">
                    <div class="row" style="border:1px solid;border-radius:5px;margin-bottom:10px; {{ $item->status == "Cancelled" ? 'background-color: #f8d7da;' : '' }}">
                        <div class="col-md-2">
                            <div>
                                <h2>
                                    <b>{{ $loop->iteration }}.</b>
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h3><b>{{ $item->order_id }}</b></h3>
                            </div>
                        </div>
                        <div class="col-md-2">
                            @if ($item->status == 'Cancelled')
                                <div>
                                    <h3 style="color:red;">
                                        <b>
                                            Cancelled
                                        </b>
                                    </h3>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2">                        
                            <div>
                                <h3>
                                    <b>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                                    </b>
                                </h3>
                            </div>                        
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <h3>
                                        <b>
                                            {{ $item->orders->count() }} Item{{ $item->orders->count() > 1 ? 's' : '' }}
                                        </b>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>No order available</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

            <div class="row" style="text-align: right;">                
                {{ $orders->links() }}                
            </div>
        </div>
    </div>
    {{-- END OVERVIEW --}}
@endsection