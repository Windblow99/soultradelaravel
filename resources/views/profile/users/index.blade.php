@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Personalities</th>
                                    <th scope="col">Profile Picture</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>                           
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td>{{$user->bio}}</td>
                                    <td>{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
                                    <td>{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
                                    <td><img style="width:100%" src="/storage/profile_pictures/{{$user->profile_picture}}"></td>
                                    <td>{{$user->availability}}</td>
                                    <td>
                                        @can('manage-profile')
                                            <a href="{{route('profile.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection