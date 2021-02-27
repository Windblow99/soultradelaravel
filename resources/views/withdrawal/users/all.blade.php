@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>System Overall Financials and Withdrawals</h2></center>

        <div class="form-group row justify-content-center">
            <label class="col-form-label col-md-3">Total earnings (System): RM {{auth()->user()->balance}}</label>

            <div class="col-md-4">
                <a class="btn btn-primary" href="{{ URL::to('/withdrawals/pdf') }}">Export to PDF</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <table class="table table-bordered mt-3 table-hover table-responsive-xl">
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
@endsection