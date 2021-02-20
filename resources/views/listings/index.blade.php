@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listings</h2>
            </div>
            <div class="pull-right">
                @can('listing-create')
                <a class="btn btn-success" href="{{ route('listings.create') }}"> Create New Listing</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($listings as $listing)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $listing->name }}</td>
	        <td>{{ $listing->detail }}</td>
	        <td>
                <form action="{{ route('listings.destroy',$listing->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('listings.show',$listing->id) }}">Show</a>
                    @can('listing-edit')
                    <a class="btn btn-primary" href="{{ route('listings.edit',$listing->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('listing-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $listings->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection