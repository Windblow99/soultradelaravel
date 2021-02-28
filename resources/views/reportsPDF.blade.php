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
    <h1>All User Reports</h1>
    <p> Date: 
        <?php
            echo date("d-m-y");
        ?>
    </p>

    <table class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Reported ID</th>
            <th scope="col">Reported Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
        </tr>
    @foreach($reports as $report)
        <tr>
            <th scope="row">{{$report->id}}</th>
            <th scope="row">{{$report->user_id}}</th>
            <th scope="row">{{$report->user_name}}</th>
            <td>{{$report->description}}</td>
            <td>{{$report->created_at}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>