@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Products</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>
        <div class="panel-body">
            <div class="form-group text-left">
                <a href="{{ url('admin/products/create') }}" class="btn btn-success">ADD</a>
            </div>

            <div class="row">
                @forelse ($products as $item)                    
                    <div class="col-md-12" style="margin-bottom: 5px;">
                        <div style="padding:5px;border:1px solid #e1e1e1;display:flex;justify-content:space-between;">
                            <div>
                                <img src="{{ $item->image_url }}" height="100px" width="100px">
                            </div>
                            <div style="display: flex;align-items:center;">
                                <h1>{{ $item->name }}</h1>
                            </div>
                            <div style="display: flex;align-items:center;max-width:300px;">
                                <h5>{{ $item->short_desc }}</h5>
                            </div>
                            <div style="display: flex;align-items:center;">
                                <form action="{{ url('/admin/products/'. $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/admin/products/'. $item->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ url('/admin/products/'. $item->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>                        
                    </div>
                @empty
                    
                @endforelse
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- END OVERVIEW --}}
@endsection