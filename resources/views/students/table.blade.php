<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Students</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('students.create') }}"> Add New Student</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

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

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Joined On</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($students as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->age }}</td>
            <td>{{ $s->email }}</td>
            <td>{{ $s->created_at }}</td>
            <td>
                <form action="{{ route('students.destroy', $s->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('students.show', $s->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('students.edit', $s->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
