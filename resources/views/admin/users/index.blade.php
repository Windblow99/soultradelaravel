@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>All System Users</h2></center>
        <form action="{{ route('admin.users.index') }}" method="GET" role="search">
            <div class="row">
                <div class="col-sm-7">
                    <input type="text" class="form-control mr-3" name="term" placeholder="Search user..." id="term">
                </div>
                <div class="col-sm-5">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit" title="Search user">
                            Search User
                        </button>
                    </span>
                    <a href="{{ route('admin.users.index') }}">
                        <span class="input-group-btn ml-3">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                Refresh View
                            </button>
                        </span>
                    </a>
                    <a class="btn btn-primary ml-3" href="{{ URL::to('/admin/pdf') }}">Export to PDF</a>
                </div>
            </div>
        </form>

        <div class="row justify-content-center">     
            <table class="table mt-3 table-hover table-responsive-xl table-border">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Bio</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Personalities</th>
                        <th scope="col">Approved</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>                           
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>{{$user->bio}}</td>
                        <td>{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
                        <td>{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
                        <td>{{$user->approved}}</td>
                        <td>
                            @if ($user->name != 'Admin')
                            @can('edit-users')
                                <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                            @endcan
                            @can('delete-users')
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger ml-3" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection