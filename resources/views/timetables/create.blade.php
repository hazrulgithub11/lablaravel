@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Timetable</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('timetables.index') }}"> Back</a>
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

<form action="{{ route('timetables.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day:</strong>
                <select class="form-control @error('day_id') is-invalid @enderror" name="day_id" required>
                    <option value="">Select Day</option>
                    @foreach($days as $day)
                        <option value="{{ $day->id }}" {{ old('day_id') == $day->id ? 'selected' : '' }}>
                            {{ $day->day_name }}
                        </option>
                    @endforeach
                </select>
                @error('day_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject:</strong>
                <select class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" required>
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->subject_code }} - {{ $subject->subject_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hall:</strong>
                <select class="form-control @error('hall_id') is-invalid @enderror" name="hall_id" required>
                    <option value="">Select Hall</option>
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}" {{ old('hall_id') == $hall->id ? 'selected' : '' }}>
                            {{ $hall->lecture_hall_name }}
                        </option>
                    @endforeach
                </select>
                @error('hall_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Group:</strong>
                <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" required>
                    <option value="">Select Group</option>
                    <!-- In the groups dropdown -->
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">
                        {{ $group->name }}  <!-- Changed from group_name to name -->
                    </option>
                @endforeach
                </select>
                @error('group_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time From:</strong>
                <input type="time" name="time_from" class="form-control @error('time_from') is-invalid @enderror" 
                    value="{{ old('time_from') }}" required>
                @error('time_from')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time To:</strong>
                <input type="time" name="time_to" class="form-control @error('time_to') is-invalid @enderror" 
                    value="{{ old('time_to') }}" required>
                @error('time_to')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection