@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Seller Name</th>
                                    <th scope="col">Pricing</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Remark</th>
                                </tr>
                            </thead>                           
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <th scope="row">{{$order->seller_name}}</th>
                                    <td>RM{{$order->pricing}}</td>
                                    <td>{{$order->type}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->purpose}}</td>
                                    <td>{{$order->remarks}}</td>
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