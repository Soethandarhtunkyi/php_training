<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Assigment 4</title>
</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-lg-12 margin-tb">
        <div class="float-start">
          <h2>Edit Student</h2>
        </div>
        <div class="float-end">
          <a class="btn btn-primary" href="{{ url('/api/') }}"> Back</a>
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

    <form action="" method="POST" id="updateStudent">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <input type="hidden" id="getId" value="{{ request()->route('id') }}">
            <strong>Name:</strong>
            <input type="text" name="name" value="" id="name" class="form-control" placeholder="Name">
            <div class="error-name"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Age:</strong>
            <input type="number" name="age" value="" id="age" class="form-control" placeholder="Age">
            <div class="error-age"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Major:</strong>
            <select id="major" class="form-control" name="major_id">

            </select>
            <div class="error-major"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" id="submit" class="btn btn-primary mt-2">Submit</button>
        </div>
      </div>

    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    var id = $('#getId').val();
    $.ajax({
      type: 'GET',
      url: "http://localhost:8000/api/students/" + id,
      success: function(data) {
        $("#name").val(data['name']);
        $("#age").val(data['age']);
      },
    });

    $.ajax({
      type: 'GET',
      url: "http://localhost:8000/api/majors",
      success: function(data) {
        data.forEach(result => {
          $("#major").append(`
            <option value="${result.id}">${result.major}</option>
          `);
        });
      },
    });

    $('#submit').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        url: '/api/students/update/' + id,
        method: 'PUT',
        data: $('#updateStudent').serialize(),
        success: function(data) {
          $name = $('#name').val();
          console.log($name);
          alert("Student Updated Successfully!");
          window.location = "/api";
        },
        error: function(err) {
          $name = $('#name').val();
          $age = $('#age').val();
          $major = $('#major').val();
          if (!$name) {
            $(".error-name").addClass("alert alert-danger").append("Name Field Cannot be empty!");
          }
          if (!$age) {
            $(".error-age").addClass("alert alert-danger").append("Age Field Cannot be empty!");
          }
          if (!$major) {
            $(".error-major").addClass("alert alert-danger").append("Major Field Cannot be empty!");
          }
        }
      });
    });
  </script>
</body>

</html>