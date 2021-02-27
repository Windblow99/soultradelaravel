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
    <h1>All system orders</h1>
    <p> Date: 
        <?php
            echo date("d-m-y");
        ?>
    </p>

        <table class="table">
            
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

            @foreach($orders as $order)
                <tr>
                    <td scope="row">{{$order->id}}</td>
                    <td scope="row">{{$order->buyer_id}}</td>
                    <td scope="row">{{$order->buyer_name}}</td>
                    <td scope="row">{{$order->seller_id}}</td>
                    <td scope="row">{{$order->seller_name}}</td>
                    <td>RM{{$order->pricing}}</td>
                    <td>{{$order->type}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>