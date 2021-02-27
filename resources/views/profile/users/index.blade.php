@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>Account Details</h2></center>
        <div class="row justify-content-center ml-5 pl-5">
            <div class="col-md-8">
                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Picture</label>

                    <div class="col-md-6">
                        <img src="/storage/profile_pictures/{{Auth::user()->profile_picture}}" class="thumbnail">
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{Auth::user()->name}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Email</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{Auth::user()->email}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Roles</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{implode(', ', Auth::user()->roles()->get()->pluck('name')->toArray())}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Bio</label>

                    <div class="col-md-6">
                        <textarea type="text" class="form-control-plaintext" readonly>{{Auth::user()->bio}}</textarea>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Categories</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{implode(', ', Auth::user()->category()->get()->pluck('name')->toArray())}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Personalities</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{implode(', ', Auth::user()->personality()->get()->pluck('name')->toArray())}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Availability</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="{{Auth::user()->availability}}" readonly>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Price</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="RM {{Auth::user()->price}} per hour" readonly>
                    </div>
                </div>

                @can('manage-profile')
                    <a href="{{route('profile.users.edit', Auth::user()->id)}}"><button type="button" class="btn btn-primary float-left">Edit Profile</button></a>
                @endcan
            </div>
        </div>
    </div>
@endsection