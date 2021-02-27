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
    <h1>System Financials and Withdrawals</h1>
    <p> Date: 
        <?php
            echo date("d-m-y");
        ?>
    </p>

    <table class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Bank Name</th>
            <th scope="col">Bank Account</th>
            <th scope="col">Amount</th>
            <th scope="col">Created At</th>
        </tr>
    @foreach($withdrawals as $withdrawal)
        <tr>
            <th scope="row">{{$withdrawal->id}}</th>
            <th scope="row">{{$withdrawal->user_id}}</th>
            <th scope="row">{{$withdrawal->user_name}}</th>
            <th scope="row">{{$withdrawal->bank_name}}</th>
            <th scope="row">{{$withdrawal->bank_account}}</th>
            <td>RM{{$withdrawal->amount}}</td>
            <td>{{$withdrawal->created_at}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>