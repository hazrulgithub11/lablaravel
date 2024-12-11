
@extends('layouts.template')

@section('content')

<style>
    .table-bordered {
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
    }
    
    /* Optional: Style table headers */
    .table-bordered th {
        background-color: #343a40; /* Dark background */
        color: white;
    }
    
    /* Optional: Style table rows */
    .table-bordered td {
        background-color: rgba(255, 255, 255, 0.8);
    }
    
    /* Optional: Hover effect on rows */
    .table-bordered tr:hover td {
        background-color: rgba(240, 240, 240, 0.9);
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Halls</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('halls.create') }}"> Add New Hall</a>
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
        <th>Lecture Hall Name</th>
        <th>Lecture Hall Place</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($halls as $hall)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $hall->lecture_hall_name }}</td>
        <td>{{ $hall->lecture_hall_place }}</td>
        <td>
            <form action="{{ route('halls.destroy', $hall->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('halls.show', $hall->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('halls.edit', $hall->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection