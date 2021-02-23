@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Personality</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>                           
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->bio}}</td>
                                    <td>{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
                                    <td>{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        @can('users-only')
                                            <a href="{{route('user.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Show</button></a>
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