<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <h1>Title</h1>
    <p>25-02-2021</p>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Approved</th>
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
                    <td>{{$user->approved}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>