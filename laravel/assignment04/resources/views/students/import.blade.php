<!DOCTYPE html>
<html>

<head>
  <title>Assignment 4</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>

  <div class="container">
    <div class="card bg-light mt-3">
      @if ($message = Session::get('success'))
      <div class="alert alert-success pt-3">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="card-header">
      </div>
      <div class="card-body">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <h2>Import</h2>
          <p>Choose file to import</p>
          <input type="file" name="file" class="form-control">
          <br>
          <button class="btn btn-success">Import Student Data</button>
          <h2>Export</h2>
          <a class="btn btn-warning" href="{{ route('export') }}">Export Student Data</a>
        </form>
      </div>
    </div>
  </div>

</body>

</html>