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
                                        <label for="personalities" class="col-md-2 col-form-label text-md-right">Filters</label>
                                        <div class="col-md-3" id="selectFilters">
                                            @foreach($personalities as $personality)
                                                <div class="form-check">
                                                    <input type="checkbox" value="{{$personality->name}}">
                                                    <label>{{$personality->name}}</label>
                                                </div>
                                            @endforeach
                                            @foreach($categories as $category)
                                                <div class="form-check">
                                                    <input type="checkbox" value="{{$category->name}}">
                                                    <label>{{$category->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button onclick="filterSelection()">Filter</button>
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
                                    <td class="filters"><span class="filter">{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</span></td>
                                    <td class="filters"><span class="filter">{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</span></td>
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
function filterSelection() {
    // Show all rows (in case any were hidden by a previous filtering)
    $("#usersTable > tr:hidden, #usersTable > tbody > tr:hidden").show();
    // Get all filtered countries as array
    var selCountries = $("#selectFilters :checkbox:checked").map(function () {
        return $(this).val();
    }).get();
    if (selCountries.length < 1) {
        return; // No countries are selected!
    }
    var selCties = $("#city-filters :checkbox:checked").map(function () {
        return $(this).val();
    }).get();
    // Loop through all table rows
    var x = $("#usersTable > tr, #usersTable > tbody > tr").filter(function (idx, ele) {
        var countries = $(ele).find('td.filters span.filter');
        var nFoundCountries = selCountries.filter(function (ele, idx) {
            return countries.text().indexOf(ele) != -1;
        }).length;
        if (selCties.length == 0) {
            return (nFoundCountries == 0);
        } else {
            var cities = $(ele).find('td.city');
            var nFoundCities = selCties.filter(function (ele, idx) {
                return cities.text().indexOf(ele) != -1;
            }).length;

            return !(nFoundCities == selCties.length &&
            (nFoundCountries == countries.length && nFoundCountries == selCountries.length));
        }
    }).hide();
};
</script>