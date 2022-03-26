@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">

        <div class="panel-heading" style="display:flex;align-items:center;">
            <a class="btn btn-warning" href="{{ url('/admin/products') }}">Back</a> &nbsp;
            <h3 class="panel-title">Show Product</h3>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <img src="{{ $product->image_url }}" height="200px" width="200px">
                    </div>
                </div>
                <div class="col-md-9">
                    <div style="display: flex;justify-content:space-between;overflow:auto;">
                        @forelse ($product->images as $item)
                            <div style="margin: 5px;">
                                <img src="{{ $item->image_url }}" height="150px" width="150px">
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6">
                    <div>
                        <h3>Name : {{ $product->name }}</h3>
                    </div>
                    <div>
                        <h3>Short desc. : {{ $product->short_desc }}</h3>
                    </div>
                    <div>
                        <h3>Price : {{ $product->price }}</h3>
                    </div>
                    <div>
                        <h3>Price display : {{ $product->price_display }}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3>Special label : {{ $product->special_label }}</h3>
                    </div>
                    <div>
                        <h3>Label type : {{ $product->label_type }}</h3>
                    </div>
                    <div>
                        <h3>Status : {{ $product->status }}</h3>
                    </div>
                    <div>
                        <h3>Best seller : {{ $product->best_seller }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3>Description : {{ $product->description }}</h3>
                    </div>                    
                </div>                
            </div>
        </div>

    </div>
     {{-- END OVERVIEW --}}
@endsection