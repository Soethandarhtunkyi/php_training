@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
  <h2 class="mb-4">Upload Student</h2>
  @if(isset($errors)&& $errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
  </div>
  @endif
  <form action="{{ route('students.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
      <div class="custom-file text-left">
        <input type="file" class="form-control" name="file" accept=".csv, .xlsx">
      </div>
    </div>
    <button class="btn btn-primary">Import data</button>
  </form>
</div>
@endsection