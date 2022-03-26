@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">

        <div class="panel-heading">
            <h3 class="panel-title">Add New Product</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>

        <div class="panel-body">
            {{ Form::open(array('url' => 'admin/products', 'method' => 'POST', 'files' => true)) }}
                @csrf

                @include('admin.product.form')

                <div class="form-group text-right">
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    <a href="{{ url('admin/products') }}" class="btn btn-danger">Cancel</a>
                </div>
            {{ Form::close() }}
        </div>

    </div>
    <!-- END OVERVIEW --> 
@endsection