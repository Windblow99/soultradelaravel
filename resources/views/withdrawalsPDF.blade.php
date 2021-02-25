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
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Bank Account</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>                           
            <tbody>
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
            </tbody>
        </table>
    </div>
</body>
</html>