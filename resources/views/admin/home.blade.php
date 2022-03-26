@extends('admin.layouts.main')

@section('content')    
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">
        <div class="panel-heading">
            <div style="display: flex;justify-content: space-between">
                <div>
                    <h3 class="panel-title">Dashboard</h3>
                </div>                
            </div>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>
        <div class="panel-body">
            <div class="row">
                <a href="/admin/categories">
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <p>
                                <span class="number">{{ $category_count }}</span>
                                <span class="title">Categories</span>
                            </p>
                        </div>
                    </div>
                </a>
                <a href="/admin/products">
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <p>
                                <span class="number">{{ $product_count }}</span>
                                <span class="title">Products</span>
                            </p>
                        </div>
                    </div>
                </a>
                <a href="/admin/orders">
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <p>
                                <span class="number">{{ $orders_count }}</span>
                                <span class="title">Total Orders</span>
                            </p>
                        </div>
                    </div>
                </a>
            
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-list"></i></span>
                        <p>
                            <span class="number">{{ $orders_count_today }}</span>
                            <span class="title">Today's Orders</span>
                        </p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    {{-- END OVERVIEW --}}       
@endsection
