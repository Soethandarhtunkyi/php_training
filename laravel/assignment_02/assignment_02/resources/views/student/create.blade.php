@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card mb-5">
    <div class="card-header">New Student</div>
    <div class="col-md-8 mx-auto p-5">
      <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" value="{{ old('email') }}" name="email">
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="major" class="form-label">Major</label>
          <select class="browser-default custom-select" size="1" name="major">
            @foreach ($majors as $major)
            @if (old('major') == $major->id)
            <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
            @else
            <option value="{{$major->id}}">{{ $major->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" value="{{ old('phone') }}" name="phone">
          @if ($errors->has('phone'))
          <span class="text-danger">{{ $errors->first('phone') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address">{{ old('address') }}</textarea>
          @if ($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">
          Add Student
        </button>
      </form>
    </div>
  </div>
</div>
@endsection