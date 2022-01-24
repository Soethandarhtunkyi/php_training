@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 mx-auto my-2">
    <div class="card mb-5">
      <div class="card-header">
        <h2>Send Student Lists to email</h2>
      </div>
      <form action="{{ route('sendEmailForm') }}" method="POST">
        @csrf
        <div class="mb-3">
          <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" class="form-control" placeholder="Email">
            @error('email')
            <span class="alert alert-danger mt-1 mb-1 d-block">
              {{ $message }}
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </div>
  </form>
  @endsection