@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>Account Details</h2></center>

        <div class="row justify-content-center">
            @foreach($users as $user)
                <div class="col-3">
                    <img src="/storage/profile_pictures/{{$user->profile_picture}}" class="thumbnail" style="width:200px;height:300px;">
                </div>
                <div class="col-9">
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Name</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{$user->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Email</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{$user->email}}" readonly>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Roles</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}" readonly>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Bio</label>
    
                        <div class="col-md-6">
                            <textarea type="text" class="form-control-plaintext" readonly>{{$user->bio}}</textarea>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Categories</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}" readonly>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Personalities</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}" readonly>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Availability</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{$user->availability}}" readonly>
                        </div>
                    </div>
    
                    <div class="form-group row mt-4">
                        <label class="col-md-2 col-form-label">Price</label>
    
                        <div class="col-md-6">
                            <input type="text" class="form-control-plaintext" value="{{$user->price}}" readonly>
                        </div>
                    </div>
                </div>

                @can('manage-profile')
                    <a href="{{route('profile.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit Profile</button></a>
                @endcan
            @endforeach 
        </div>
    </div>
@endsection