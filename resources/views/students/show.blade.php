@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Student Details</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $student->name }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $student->email }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Joined On:</strong>
                {{ $student->created_at }}
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
@endsection
