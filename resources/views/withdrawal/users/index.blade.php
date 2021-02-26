@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Withdrawal</div>

                    <div class="card-body">
                        <form action="{{route('withdrawal.users.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="amount" class="col-md-2 col-form-label text-md-right">Withdrawal Amount</label>
    
                                <div class="col-md-6">
                                    <input id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ Auth::user()->balance }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_name" class="col-md-2 col-form-label text-md-right">Bank Name</label>
    
                                <div class="col-md-6">
                                    <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="" required autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_account" class="col-md-2 col-form-label text-md-right">Bank Account</label>
    
                                <div class="col-md-6">
                                    <input id="bank_account" type="textarea" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="" required autofocus>
    
                                    @error('bank_account')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="previous_id" class="col-md-2 col-form-label text-md-right">Previous ID</label>
    
                                <div class="col-md-6">
                                    <input id="previous_id" type="text" class="form-control" name="previous_id" value="{{ $withdrawals->id }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="previous_hash" class="col-md-2 col-form-label text-md-right">Previous Hash</label>
    
                                <div class="col-md-6">
                                    <input id="previous_hash" type="text" class="form-control" name="previous_hash" value="{{ $withdrawals->previous_hash }}" readonly>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection