@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>All User Reports</h2></center>

            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary ml-5" href="{{ URL::to('/reports/pdf') }}">Export to PDF</a>
            </div>

        <div class="row justify-content-center">
            <table class="table table-bordered mt-3 table-hover table-responsive-xl">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reported ID</th>
                        <th scope="col">Reported Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>                           
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <th scope="row">{{$report->id}}</th>
                        <th scope="row">{{$report->user_id}}</th>
                        <th scope="row">{{$report->user_name}}</th>
                        <th scope="row">{{$report->description}}</th>
                        <td>{{$report->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection