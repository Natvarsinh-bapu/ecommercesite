@extends('layouts/main')

@section('content')
    {{-- cart --}}

    <div class="new_arrivals shop-title-div">
        <div class="container">            
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>My Profile</h2>
                    </div>
                </div>
            </div>                        
            
                {{ Form::open(array('url' => url('/update-profile'), 'method' => 'POST')) }}
                    @csrf
                    <div class="row shop-title-div">
                        <div class="col-md-4">
                            <div class="text-center mb-2">
                                <img src="{{ $user->profile_image }}" alt="" width="200px" height="200px" style="border-radius: 50%">
                            </div>
                            <div class="text-center">
                                <label class="btn btn-warning cursor-pointer" for="profile">Change</label>                                
                            </div>
                        </div>
                        <div class="col-md-4">                        
                            <div class="my-profile">
                                <div class="mb-2">
                                    <h5>Name: &nbsp; {{ $user->name }}</h5>
                                    <input class="form-control _edit_profile_control" type="text" value="{{ $user->name }}" name="name" placeholder="Name" style="color:#000;{{ $errors->has('name') ? 'display:block;' : 'display:none;'}}" required> 
                                    @error('name')
                                        <div style="color:red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <h5>Email: &nbsp; {{ $user->email }}</h5>
                                </div>
                                <div class="mb-2">
                                    <h5>Phone: &nbsp; {{ $user->phone }}</h5>
                                    <input class="form-control _edit_profile_control" type="text" id="user_phone" value="{{ $user->phone }}" name="phone" placeholder="Mobile No." style="color:#000;{{ $errors->has('phone') ? 'display:block;' : 'display:none;'}}" required> 
                                    @error('phone')
                                        <div style="color:red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="my-profile">
                                <div class="mb-2">
                                    <h5>Address: &nbsp; {{ $user->address }}</h5>
                                    <textarea name="address" class="form-control _edit_profile_control" rows="5" placeholder="Address" style="color: #000; {{ $errors->has('address') ? 'display:block;' : 'display:none;'}}" required>{{ $user->address }}</textarea>
                                    @error('address')
                                        <div style="color:red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="display: flex;justify-content:right;">
                                <a id="edit_profile_btn" class="btn btn-primary cursor-pointer" style="color:#fff;{{ $errors->any() ? 'display:none;' : '' }}">Edit</a>
                                <a id="cancel_profile_btn" class="btn btn-danger cursor-pointer ml-2 _edit_profile_control" style="color:#fff;{{ $errors->any() ? 'display:block;' : 'display:none;' }}">Cancel</a>
                                <button class="btn btn-success ml-2 cursor-pointer _edit_profile_control" type="submit" style="{{ $errors->any() ? 'display:block;' : 'display:none;' }}">Save</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}

                {{ Form::open(array('url' => url('/update-profile-pic'), 'method' => 'POST', 'files' => true, 'id' => 'profile_pic_form')) }}
                    @csrf                    
                    <input type="file" name="profile" id="profile" style="display: none;">
                {{ Form::close() }}
        </div>
    </div>
@endsection