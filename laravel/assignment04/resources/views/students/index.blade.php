@extends('students.layout')

@section('content')
<div class="row mt-3">
  <h2>Search Students</h2>
  <form action="{{ url('/students/search') }}" class="col-12" method="GET">
    <div class="form-group">
      <label for="">Name</label>
      <input type="search" name="name" id="" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="">Start Date</label>
      <input type="date" name="start_date" id="" class="form-control" placeholder="Start Date">
    </div>
    <div class="form-group">
      <label for="">End Date</label>
      <input type="date" name="end_date" id="" class="form-control" placeholder="End Date">
    </div>
    <button class="btn btn-primary mt-2">Search</button>
  </form>
</div>

<div class="row mt-5">
  <div class="col-12">
    <div class="float-start">
      <h2>Students List</h2>
    </div>
    <div class="float-end">
      <a class="btn btn-success" href="{{ url('/importExportView') }}">Import/Export View</a>
      <a class="btn btn-success" href="{{ url('/create') }}">Add new Students</a>
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
    <th>Age</th>
    <th>Major</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->age }}</td>
    <td>{{ $student->major}}</td>
    <td>
      <form action="{{ url('delete/'.$student->id) }}" method="POST">
        <a class="btn btn-primary" href="{{ url('/edit',$student->id) }}">Edit</a>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

@endsection