@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-4">
                            <a class="btn btn-primary" href="{{ URL::to('/withdrawals/pdf') }}">Export to PDF</a>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-form-label text-md-right">Total earnings (System): </label>

                            <div class="col-md-6">
                                <label class="col-md-3 col-form-label text-md-right">RM {{auth()->user()->balance}}</label>
                            </div>
                        </div>

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
                </div>
            </div>
        </div>
    </div>
@endsection