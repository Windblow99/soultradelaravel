@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div>
                    <div class="mx-auto pull-right">
                        <div class="">
                            <form action="{{ route('admin.users.index') }}" method="GET" role="search">
                                <i class="fas fa-search"></i>
            
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search user" id="term">
                                    <span class="input-group-btn mr-5 mt-1">
                                        <button class="btn btn-info" type="submit" title="Search user">
                                            Search
                                        </button>
                                    </span>
                                    <a href="{{ route('admin.users.index') }}" class=" mt-1">
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
                        <div class="d-flex justify-content-end mb-4">
                            <a class="btn btn-primary" href="{{ URL::to('/admin/pdf') }}">Export to PDF</a>
                        </div>
                
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
                                    <th scope="col">Price</th>
                                    <th scope="col">Approved</th>
                                    <th scope="col">Verification Picture</th>
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
                                    <td>{{$user->price}}</td>
                                    <td>{{$user->approved}}</td>
                                    <td><img style="width:100%" src="/storage/verification_documents/{{$user->verification_file}}"></td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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