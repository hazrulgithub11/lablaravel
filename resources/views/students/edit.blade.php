@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Age:</strong>
                    <input type="number" name="age" value="{{ $student->age }}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
        </div>
    </form>
@endsection
