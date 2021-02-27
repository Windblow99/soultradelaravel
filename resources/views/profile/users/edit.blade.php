@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center><h2>Change account password</h2></center>

                <form action="{{route('profile.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group row mt-4">
                        <label for="email" class="col-md-2 col-form-label">Email Address</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bio" class="col-md-2 col-form-label">Bio</label>

                        <div class="col-md-8">
                            <textarea id="bio" type="textarea" class="form-control @error('bio') is-invalid @enderror" name="bio" required autofocus>{{$user->bio}}</textarea>

                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label">Price</label>

                        <div class="col-md-8">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$user->price}}" required autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="roles" class="col-md-2 col-form-label">Roles</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control-plaintext @error('price') is-invalid @enderror" value="{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}" required autofocus>
                        </div>
                    </div>

                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="categories" class="col-md-2 col-form-label">Categories</label>
                        <div class="col-md-8">
                            @foreach($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="categories[]" value="{{$category->id}}" @if($user->hasCategory($category->name)) checked @endif>
                                    <label class="form-check-label">{{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="personalities" class="col-md-2 col-form-label">Personalities</label>
                        <div class="col-md-8">
                            @foreach($personalities as $personality)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="personalities[]" value="{{$personality->id}}" @if($user->hasPersonality($personality->name)) checked @endif>
                                    <label class="form-check-label">{{$personality->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputRole" class="col-md-2 col-form-label">Profile Picture</label>

                        <div class="col-md-8">
                            <input id="profile_picture" type="file" class="form-control-file" name="profile_picture">
                        </div>
                    </div>
                    
                    @if(Auth::user()->approved == "NO")
                    <div class="form-group row">
                        <label for="verification_document" class="col-md-2 col-form-label">Verification Document</label>

                        <div class="col-md-8">
                            <input id="verification_document" type="file" class="form-control-file" name="verification_document">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="availability" class="col-md-2 col-form-label">Availability</label>

                        <div class="col-md-8">
                            <select class="custom-select" id="availability" name="availability">
                                <option value="NO" @if(Auth::user()->availability == "NO") selected @endif>NO</option>
                                <option value="YES" @if(Auth::user()->availability == "YES") selected @endif>YES</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
        </div>
    </div>
@endsection