@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details for Medical {{$user->name}}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-2 col-form-label text-md-right">bio</label>

                            <div class="col-md-6">
                                <input id="bio" type="textarea" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{$user->bio}}" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="price" type="textarea" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$user->price}}" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Profile Picture</label>

                            <div class="col-md-6">
                                <img style="width:100%" src="/storage/profile_pictures/{{$user->profile_picture}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection