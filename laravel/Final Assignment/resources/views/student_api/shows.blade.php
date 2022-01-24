@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Current Ajax Students
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" align="center" id="success">
      <strong>{{Session::get('success')}}</strong>
    </div>
    @endif

    <div class="card-body">
      <table class="table table-striped task-table">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Major</th>
          <th>Phone</th>
          <th>Major</th>
          <th>Address</th>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/api/getdata',
      success: function(result) {
        result.forEach(students => {
          $("tbody").append(`<tr>
                <td id="sid">${students.id}</td>
                <td>${students.name}</td>
                <td>${students.email}</td>
                <td>${students.phone}</td>
                <td>${students.major.name}</td>
                <td>${students.address}</td>
                <td>
                    <td><a id="edit-post"
                        data-id="${students.id}" href="/update/${students.id}"
                        class="btn btn-info">Edit</a></td>
                    </td>
                    <td><a id="delete-post"
                        data-id="${students.id}"
                        class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>`);
        });
        console.log(result);
      }
    });
    $(document).on('click', '#edit-post', function() {

      var id = $(this).data('id');
      var url = 'http://localhost:8000/api/students/' + id + '/edit';

      $.get(url, {
        id: id
      }, function(data) {
        console.log(data);
      }, 'json');
    });

    $(document).on('click', '#delete-post', function(e) {
      e.preventDefault();
      var id = $(this).data("id");
      var confirmation = confirm("are you sure?");
      if (confirmation) {
        $.ajax({
          url: 'http://localhost:8000/api/delete/' + id,
          type: "DELETE",
          cache: false,
          success: function(response) {
            $('#sid' + id).remove();
            location.reload();
          }
        });
      }
    });
  });
</script>
@endsection