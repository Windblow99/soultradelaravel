@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ml-4">
                <center><h2>Confirmation Details</h2></center>

                <form action="{{route('order.users.store', $user->id)}}" method="POST">
                    @csrf
                    <div class="form-group row mt-4">
                        <label for="id" class="col-md-3 col-form-label">User ID</label>

                        <div class="col-md-6">
                            <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$user->id}}" required readonly>

                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required readonly>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        @if($user->hasRole('Medical'))
                            <label for="price" class="col-md-3 col-form-label">Price</label>
                        @else
                            <label for="price" class="col-md-3 col-form-label">Requesting</label>
                        @endif

                        <div class="col-md-6">
                            <input id="price" type="textarea" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$user->price}}" required readonly>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-3 col-form-label">Purpose</label>

                        <div class="col-md-6">
                            @if($user->hasRole('Medical'))
                                <select class="custom-select" id="purpose" name="purpose">
                                    <option value="Request for medical issues" selected>Request for medical issues</option>
                                </select>
                            @else
                                <select class="custom-select" id="purpose" name="purpose">
                                    <option value="Request to play games" selected>Request to play games</option>
                                    <option value="Request to chat">Request to chat</option>
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-md-3 col-form-label">Type</label>

                        <div class="col-md-6">
                            @if($user->hasRole('Medical'))
                                <input id="type" type="text" class="form-control" name="type" value="Medical" readonly>
                            @else
                                <input id="type" type="text" class="form-control" name="type" value="User" readonly>
                            @endif
                        </div>
                    </div>

                    @if($user->hasRole('Medical'))
                        <button type="submit" class="btn btn-primary mt-3">
                            Confirm Order
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary mt-3">
                            Confirm Request
                        </button>
                    @endif
                </form>
        </div>
    </div>
@endsection