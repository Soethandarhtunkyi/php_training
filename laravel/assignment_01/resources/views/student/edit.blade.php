@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card mb-5">
    <div class="card-header">Edit Student</div>
    <div class="col-md-8 mx-auto p-5">
      <form action="{{ route('students.update', [$student->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}" required autofocus>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="{{ old('email', $student->email) }}" required>
        </div>
        <div class="form-group">
          <label for="major" class="form-label">Major</label>
          <select class="browser-default custom-select" size="1" name="major">
            @foreach ($majors as $major)
            @if (old('major') == $major->id || $major->id == $student->major_id)
            <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
            @else
            <option value="{{$major->id}}">{{ $major->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" name="phone" value="{{ old('phone', $student->phone) }}" required>
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address" required>{{ old('address', $student->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
          Update Student
        </button>
      </form>
    </div>
  </div>
</div>
@endsection