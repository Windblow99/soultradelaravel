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
                    <th scope="col">Buyer ID</th>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Seller ID</th>
                    <th scope="col">Seller Name</th>
                    <th scope="col">Pricing</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>                           
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <th scope="row">{{$order->buyer_id}}</th>
                    <th scope="row">{{$order->buyer_name}}</th>
                    <th scope="row">{{$order->seller_id}}</th>
                    <th scope="row">{{$order->seller_name}}</th>
                    <td>RM{{$order->pricing}}</td>
                    <td>{{$order->type}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>