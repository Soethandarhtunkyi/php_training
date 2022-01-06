@extends('layouts.app')

@section('content')
<div class="container">
  @if (count($students) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current Students
    </div>

    <div class="mt-5">
         <a href="{{ route('export') }}" class="btn btn-primary">
             Export Data
        </a>
        <a href="{{ route('import') }}" class="btn btn-success">
             Import Data
        </a>
        
    </div>

    <div class="panel-body">
      <table class="table table-striped task-table">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Major</th>
          <th>Phone</th>
          <th>Address</th>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->major->name }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->address }}</td>
            <td>
              <a href="{{ route('students.edit', [$student->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
            <td>
              <form action="{{ route('students.destroy', [$student->id]) }}" onclick="return confirm('Are you sure?')" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm delete">
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
@endsection