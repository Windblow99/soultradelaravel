@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h2>Modify Order Remark</h2></center>

        <div class="row justify-content-center">
            <div class="col-md-8 mt-3 ml-5 pl-5">
                <form action="{{route('update-remarks')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-2 col-form-label text-md-right">Order ID</label>

                        <div class="col-md-6">
                            <input id="id" type="text" class="form-control-plaintext" name="id" value="{{$orders->id}}" required readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="remarks" class="col-md-2 col-form-label text-md-right">Remarks</label>

                        <div class="col-md-6">
                            <textarea id="remarks" type="text" class="form-control" name="remarks" required>{{$orders->remarks}}</textarea>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="javascript:history.back()">Back</a>

                    <button type="submit" class="btn btn-primary ml-3">
                        Update
                    </button>
                </form>
        </div>
    </div>
@endsection