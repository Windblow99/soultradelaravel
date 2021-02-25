@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{$user->name}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.users.update', $user) }}" method="POST">
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
                                <label for="price" class="col-md-2 col-form-label text-md-right">price</label>
    
                                <div class="col-md-6">
                                    <input id="price" type="textarea" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$user->price}}" required autofocus>
    
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
                                <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->hasRole($role->name)) checked @endif>
                                            <label>{{$role->name}}</label>
                                        </div>
                                    @endforeach
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
                                    <select class="custom-select" id="approved" name="approved">
                                        <option value="NO" @if($user->isNotApproved()) selected @endif>NO</option>
                                        <option value="YES" @if($user->isApproved()) selected @endif>YES</option>
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