@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{$user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('profile.users.update', $user) }}" method="POST" enctype="multipart/form-data">
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
    
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    {{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}
                                </div>
                            </div>

                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="categories" class="col-md-2 col-form-label text-md-right">Categories</label>
                                <div class="col-md-6">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input type="checkbox" name="categories[]" value="{{$category->id}}" @if($user->hasCategory($category->name)) checked @endif>
                                            <label>{{$category->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="personalities" class="col-md-2 col-form-label text-md-right">Personalities</label>
                                <div class="col-md-6">
                                    @foreach($personalities as $personality)
                                        <div class="form-check">
                                            <input type="checkbox" name="personalities[]" value="{{$personality->id}}" @if($user->hasPersonality($personality->name)) checked @endif>
                                            <label>{{$personality->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputRole" class="col-md-2 col-form-label text-md-right">Profile Picture</label>
    
                                <div class="col-md-6">
                                    <input id="profile_picture" type="file" class="form-control" name="profile_picture">
                                </div>
                            </div>
                            
                            @can(['not-approved'])
                            <div class="form-group row">
                                <label for="verification_document" class="col-md-2 col-form-label text-md-right">Verification Document</label>
    
                                <div class="col-md-6">
                                    <input id="verification_document" type="file" class="form-control" name="verification_document">
                                </div>
                            </div>
                            @endcan

                            <div class="form-group row">
                                <label for="availability" class="col-md-2 col-form-label text-md-right">Availability</label>
    
                                <div class="col-md-6">
                                    <select class="custom-select" id="availability" name="availability">
                                        <option value="NO" selected>NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection