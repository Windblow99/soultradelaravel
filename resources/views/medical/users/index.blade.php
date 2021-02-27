@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('medical.users.index') }}" method="GET" role="search">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control mr-3" name="term" placeholder="Search medical user..." id="term">
                </div>
                <div class="col-sm-4">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit" title="Search user">
                            Search User
                        </button>
                    </span>
                    <a href="{{ route('medical.users.index') }}">
                        <span class="input-group-btn ml-3">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                Refresh View
                            </button>
                        </span>
                    </a>
                </div>
            </div>
        </form>

        <div class="row justify-content-center mt-4">               
            <table class="table table-borderless mt-3 table-hover table-responsive-xl">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Details</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>                           
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row"><img src="/storage/profile_pictures/{{$user->profile_picture}}" class="thumbnail"></th>
                        <td>{{$user->name}}<br>{{$user->bio}}<br>RM {{$user->price}} per hour</td>
                        <td>
                            <a href="{{route('medical.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Details</button></a>
                            <a href="{{route('order.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left ml-3">Order</button></a>
                            <a href="{{route('report.users.edit', $user->id)}}"><button type="button" class="btn btn-danger float-left ml-3">Report</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection