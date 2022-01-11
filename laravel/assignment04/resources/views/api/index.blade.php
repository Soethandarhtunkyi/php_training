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
    <div class="deleteRecord"></div>
    <div class="row mt-5">
      <div class="col-12">
        <div class="float-start">
          <h2>Students List</h2>
        </div>
        <div class="float-end">
          <a class="btn btn-success" href="{{ url('api/create') }}">Add new Students</a>
        </div>
      </div>
    </div>

    <div class="add-student">
      <p></p>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Age</th>
          <th>Major</th>
          <th width="280px">Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $.ajax({
      type: 'GET',
      url: "http://localhost:8000/api/students",
      success: function(result) {
        result.forEach(post => {
          $("tbody").append(`<tr><td>${post.id}</td><td>${post.name}</td><td>${post.age}</td><td>${post.major}</td><td><form action="" method="POST">
        <a class="btn btn-primary" href="api/students/edit/${post.id}">Edit</a><meta name="csrf-token" content="{{ csrf_token() }}">
        <a class="btn btn-danger deleteStudent" id="${post.id}">Delete</a>
      </form></td></tr>`);
        });

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(".deleteStudent").click(function() {
          alert("Are you sure want to delete?");
          var id = $(this).attr('id');
          $.ajax({
            url: "/api/students/delete/" + id,
            method: "DELETE",
            data: {
              "_token": "{{ csrf_token() }}",
              "id": id
            },
            success: function(data) {
              window.location.reload(null, false);
            },
            fail: function() {
              $(".deleteRecord").addClass("alert alert-danger mt-3").append("Something Wrong!");
            }
          });
        });
      }
    });
  </script>
</body>

</html>