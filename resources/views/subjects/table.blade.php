<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Lecturer Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($subjects as $subject)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $subject->subject_code }}</td>
        <td>{{ $subject->subject_name }}</td>
        <td>{{ $subject->lecturer_name }}</td>
        <td>
            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('subjects.show', $subject->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>