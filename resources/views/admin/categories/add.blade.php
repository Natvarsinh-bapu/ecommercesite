@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">

        <div class="panel-heading">
            <h3 class="panel-title">Add New Category</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>

        <div class="panel-body">
            {{ Form::open(array('url' => 'admin/categories', 'method' => 'POST', 'files' => true)) }}
            @csrf

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name', 'required' => true)) }}
                    </div>                                    
                </div>                            

            <div class="form-group text-right">
                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                <a href="{{ url('admin/categories') }}" class="btn btn-danger">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>

    </div>
    <!-- END OVERVIEW --> 
@endsection