<!DOCTYPE html>
<html>
<head>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>All system users</h1>
    <p> Date: 
        <?php
            echo date("d-m-y");
        ?>
    </p>

    <table>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Bio</th>
            <th scope="col">Categories</th>
            <th scope="col">Personalities</th>
            <th scope="col">Approved</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
            <td>{{implode(', ', $user->category()->get()->pluck('name')->toArray())}}</td>
            <td>{{implode(', ', $user->personality()->get()->pluck('name')->toArray())}}</td>
            <td>{{$user->bio}}</td>
            <td>{{$user->approved}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>