@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ml-5 pl-5">
            <div class="col-md-12">
                <form action="{{route('admin.users.update', $user) }}" method="POST">
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Email Address</label>

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
                        <label for="name" class="col-md-2 col-form-label">Name</label>

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
                        <label for="price" class="col-md-2 col-form-label">Price</label>

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
                        <label for="roles" class="col-md-2 col-form-label">Roles</label>
                        <div class="col-md-6">
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" @if($user->hasRole($role->name)) checked @endif>
                                    <label class="form-check-label">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="categories" class="col-md-2 col-form-label">Categories</label>
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <input id="profile_picture" type="file" class="form-control-file" name="profile_picture">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bio" class="col-md-2 col-form-label">Bio</label>

                        <div class="col-md-6">
                            <textarea id="bio" class="form-control @error('bio') is-invalid @enderror" name="bio" required autofocus>{{$user->bio}}</textarea>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Original Profile</label>

                        <div class="col-md-6">
                            <img src="/storage/profile_pictures/{{$user->profile_picture}}" class="thumbnail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Verification</label>

                        <div class="col-md-6">
                            <img src="/storage/verification_documents/{{$user->verification_file}}" class="thumbnail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="approved" class="col-md-2 col-form-label">Approved</label>

                        <div class="col-md-6">
                            <select class="custom-select" id="approved" name="approved">
                                <option value="NO" @if($user->approved == 'NO') selected @endif>NO</option>
                                <option value="YES" @if($user->approved == 'YES') selected @endif>YES</option>
                            </select>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="javascript:history.back()">Back</a>

                    <button type="submit" class="btn btn-primary ml-3">
                        Update
                    </button>
                </form>
        </div>
    </div>
@endsection