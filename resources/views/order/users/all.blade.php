@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <center><h2>All System Orders</h2></center>

            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary ml-5" href="{{ URL::to('/orders/pdf') }}">Export to PDF</a>
            </div>

            <table class="table table-bordered table-hover table-responsive-xl">
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
    </div>
@endsection