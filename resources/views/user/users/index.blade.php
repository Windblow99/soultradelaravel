@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div>
                    <div class="mx-auto pull-right">
                        <div class="">        
                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Search anything..." id="term" onkeyup="myFunction()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table" id="table">
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
                                <tr id="myUL">
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->bio}}</td>
                                    <td>{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
                                    <td>{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        <a href="{{route('user.users.show', $user->id)}}"><button type="button" class="btn btn-primary float-left">Details</button></a>
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


<script>
function myFunction() {

  // Declare variables 
  var input = document.getElementById("term");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("table");
  var trs = table.tBodies[0].getElementsByTagName("tr");

  // Loop through first tbody's rows
  for (var i = 0; i < trs.length; i++) {

    // define the row's cells
    var tds = trs[i].getElementsByTagName("td");

    // hide the row
    trs[i].style.display = "none";

    // loop through row cells
    for (var i2 = 0; i2 < tds.length; i2++) {

      // if there's a match
      if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

        // show the row
        trs[i].style.display = "";

        // skip to the next row
        continue;

      }
    }
  }

}
</script>