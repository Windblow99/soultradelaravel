@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>Details for Professional User</h2></center>

        <div class="row justify-content-center">
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
                    <label class="col-md-2 col-form-label">Bio</label>

                    <div class="col-md-6">
                        <textarea type="text" class="form-control-plaintext" readonly>{{$user->bio}}</textarea>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-2 col-form-label">Price</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" value="RM {{$user->price}} per hour" readonly>
                    </div>
                </div>

                <a class="btn btn-primary" href="javascript:history.back()">Back</a>
            </div>
        </div>
    </div>
@endsection