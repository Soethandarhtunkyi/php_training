<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Assignment 4</title>
</head>

<body>
  <div class="container">
    <div class="addRecord"></div>
    <div class="row mt-3">
      <div class="col-lg-12 margin-tb">
        <div class="float-start">
          <h2>Add New Student</h2>
        </div>
        <div class="float-end">
          <a class="btn btn-primary" href="{{ url('/api') }}"> Back</a>
        </div>
      </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="" method="POST" id="addStudent">
      @csrf
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name" id="name">
            <div class="error-name"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Age:</strong>
            <input type="number" name="age" class="form-control" placeholder="Age" id="age">
            <div class="error-age"></div>
          </div>
          <div class="form-group">
            <strong>Major:</strong>
            <select class="form-control major" name="major_id" id="major">

            </select>
            <div class="error-major"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary mt-3 submit" id="submit">Submit</button>
        </div>
      </div>

    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $.ajax({
      type: 'GET',
      url: "http://localhost:8000/api/majors",
      success: function(result) {
        result.forEach(post => {
          $(".major").append(`<option value="${post.id}">${post.major}</option>`);
        });
      }
    });

    $('#submit').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        url: '/api/students',
        method: 'POST',
        data: $('#addStudent').serialize(),
        success: function(data) {
          alert("Student Added Successfully!");
          window.location = "/api";
        },
        error: function(err) {
          $error = $.parseJSON(err.responseText);
          if ($error['errors']['name']) {
            $(".error-name").addClass("alert alert-danger").append($error['errors']['name'][0]);
          }
          if ($error['errors']['age']) {
            $(".error-age").addClass("alert alert-danger").append($error['errors']['age'][0]);
          }
          if ($error['errors']['major']) {
            $(".error-major").addClass("alert alert-danger").append($error['errors']['major'][0]);
          }
        }
      });
    });
  </script>
</body>

</html>