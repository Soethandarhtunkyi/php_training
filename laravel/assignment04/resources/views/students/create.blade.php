@extends('students.layout')

@section('content')
<div class="row mt-3">
  <div class="col-lg-12 margin-tb">
    <div class="float-start">
      <h2>Add New Student</h2>
    </div>
    <div class="float-end">
      <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
    </div>
  </div>
</div>

<form action="{{ url('/store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Name:</strong>
        <input type="text" name="name" class="form-control" placeholder="Name">

        @error('name')
        <span class="alert alert-danger mt-1 mb-1 d-block">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Age:</strong>
        <input type="number" name="age" class="form-control" placeholder="Age">
        @error('age')
        <span class="alert alert-danger mt-1 mb-1 d-block">
          {{ $message }}
        </span>
        @enderror
      </div>
      <div class="form-group">
        <strong>Major:</strong>
        <select class="form-control" name="major_id">
          @foreach ($majors as $major)
          <option value="{{ $major['id'] }}">
            {{ $major['major'] }}
          </option>
          @endforeach
        </select>
        @error('major')
        <span class="alert alert-danger mt-1 mb-1 d-block">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
  </div>

</form>
@endsection