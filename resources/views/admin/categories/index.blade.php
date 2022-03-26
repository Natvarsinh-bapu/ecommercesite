@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>
        <div class="panel-body">
            <div class="form-group text-left">
                <a href="{{ url('admin/categories/create') }}" class="btn btn-success">ADD</a>
            </div>

            <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($categories as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    {{ Form::open(array('url' => '/admin/categories/'. $item->id, 'method' => 'POST')) }}
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ url('/admin/categories/'. $item->id .'/edit') }}">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <button class="btn btn-danger" type="submit">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse                      
                                            
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    {{-- END OVERVIEW --}}
@endsection