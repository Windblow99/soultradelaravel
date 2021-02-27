@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('report.users.store', $user->id)}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-2 col-form-label">ID</label>

                        <div class="col-md-6">
                            <input id="id" type="text" class="form-control-plaintext @error('id') is-invalid @enderror" name="id" value="{{$user->id}}" required readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control-plaintext @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">Description</label>

                        <div class="col-md-6">
                            <textarea id="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit Report
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection