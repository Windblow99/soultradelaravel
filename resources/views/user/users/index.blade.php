@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.users.index') }}" method="GET" role="search">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control mr-3" name="term" placeholder="Search user..." id="term">
                </div>
                <div class="col-sm-4">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit" title="Search user">
                            Search User
                        </button>
                    </span>
                    <a href="{{ route('user.users.index') }}">
                        <span class="input-group-btn ml-3">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                Refresh View
                            </button>
                        </span>
                    </a>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12" id="selectFilters">
                @foreach($personalities as $personality)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="{{$personality->name}}" class="form-check-input">
                        <label class="form-check-label">{{$personality->name}}</label>
                    </div>
                @endforeach
                @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="{{$category->name}}" class="form-check-input">
                        <label class="form-check-label">{{$category->name}}</label>
                    </div>
                @endforeach

                <button class="btn btn-primary ml-3" onclick="filterSelection()">Filter Selected</button>
            </div>
        </div>

        <div class="row justify-content-center mt-2">               
            <table class="table mt-3 table-hover table-responsive-xl table-borderless" id="usersTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Details</th>
                        <th scope="col" class="filters">Classification</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>                           
                <tbody>
                @foreach($users as $user)
                    <tr id="myUL">
                        <th scope="row"><img src="/storage/profile_pictures/{{$user->profile_picture}}" class="thumbnail"></th>
                        <td>{{$user->name}}<br><br>{{$user->bio}}<br><br>RM {{$user->price}} per hour</td>
                        <td class="filters">
                            <span class="filter">{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</span>
                            <br><br>
                            <span class="filter">{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</span>
                        </td>
                        <td>
                            <a href="{{route('user.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Details</button></a>
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