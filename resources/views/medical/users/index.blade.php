@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div>
                    <div class="mx-auto pull-right">
                        <div class="">
                            <form action="{{ route('user.users.index') }}" method="GET" role="search">
                                <i class="fas fa-search"></i>
            
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search user" id="term">
                                    <span class="input-group-btn mr-5 mt-1">
                                        <button class="btn btn-info" type="submit" title="Search user">
                                            Search
                                        </button>
                                    </span>
                                    <a href="{{ route('user.users.index') }}" class=" mt-1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button" title="Refresh page">
                                                Refresh
                                            </button>
                                        </span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                    <th scope="col">Picture</th>
                                    <th scope="col">Price</th>
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
                                    <td><img style="width:100%" src="/storage/profile_pictures/{{$user->profile_picture}}"></td>
                                    <td>{{$user->price}}</td>
                                    <td>
                                        <a href="{{route('medical.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Details</button></a>
                                        <a href="{{route('order.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Order</button></a>
                                        <a href="{{route('report.users.edit', $user->id)}}"><button type="button" class="btn btn-danger float-left">Report</button></a>
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