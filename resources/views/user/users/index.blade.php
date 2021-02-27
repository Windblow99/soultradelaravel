@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div>
                    <div class="mx-auto pull-right">
                        <div class="">        
                            <div class="mx-auto pull-right">
                                <div class="">
                                    <form action="{{ route('user.users.index') }}" method="GET" role="search">                   
                                        <div class="input-group">
                                            <input type="text" class="form-control mr-2" name="term" placeholder="Search user..." id="term">
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

                                <div class="">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <div class="form-group row">
                                        <label for="personalities" class="col-md-2 col-form-label text-md-right">Personalities</label>
                                        <div class="col-md-3">
                                            @foreach($personalities as $personality)
                                                <div class="form-check">
                                                    <input type="checkbox" value="{{$personality->name}}" rel="personality">
                                                    <label>{{$personality->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <label for="categories" class="col-md-2 col-form-label text-md-right">Categories</label>
                                        <div class="col-md-3" id="selectFilters">
                                            @foreach($categories as $category)
                                                <div class="form-check">
                                                    <input type="checkbox" value="{{$category->name}}" rel="category">
                                                    <label>{{$category->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button id="filterButton">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table" id="usersTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Personality</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Profile Picture</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>                           
                            <tbody>
                            @foreach($users as $user)
                                <tr id="myUL">
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->bio}}</td>
                                    <td class="filters">{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
                                    <td class="filters">{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
                                    <td>{{$user->price}} per hour</td>
                                    <td><img style="width:100%" src="/storage/profile_pictures/{{$user->profile_picture}}"></td>
                                    <td>
                                        <a href="{{route('user.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Details</button></a>
                                        <a href="{{route('order.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Request</button></a>
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


<script>
$("input:checkbox").click(function () {
    var showAll = true;
    $('tr').not('.first').hide();
    $('input[type=checkbox]').each(function () {
        if ($(this)[0].checked) {
            showAll = false;
            var status = $(this).attr('rel');
            var value = $(this).val();            
            $('td.' + status + '[rel="' + value + '"]').parent('tr').show();
        }
    });
    if(showAll){
        $('tr').show();
    }
});
</script>