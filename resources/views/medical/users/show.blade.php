@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details for Medical {{$user->name}}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-2 col-form-label text-md-right">bio</label>

                            <div class="col-md-6">
                                <input id="bio" type="textarea" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{$user->bio}}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="approved" class="col-md-2 col-form-label text-md-right">Approved</label>

                            <div class="col-md-6">
                                <input id="approved" type="text" class="form-control @error('approved') is-invalid @enderror" name="approved" value="{{$user->approved}}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection