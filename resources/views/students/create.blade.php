@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Students</h2>
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

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
   
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="number" class="form-control" name="age" placeholder="Age">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</form>
@endsection
