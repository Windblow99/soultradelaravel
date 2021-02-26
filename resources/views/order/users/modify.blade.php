@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modify order</div>

                    <div class="card-body">
                        <form action="{{route('update-remarks')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-md-2 col-form-label text-md-right">id</label>
    
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="{{$orders->id}}" required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="remarks" class="col-md-2 col-form-label text-md-right">Remarks</label>
    
                                <div class="col-md-6">
                                    <input id="remarks" type="text" class="form-control" name="remarks" value="{{$orders->remarks}}" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection