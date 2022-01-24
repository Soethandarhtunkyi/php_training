@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card mb-5">
    <div class="card-header">Edit Student</div>
    <div class="col-md-8 mx-auto p-5">
      {{--<form method="post" >--}}
          <input type="hidden" id="edit" value="{{ request()->route('id') }}">
          {{--<input type="hidden" id="_token" value="{{ csrf_token() }}">--}}
        @csrf
        {{--@method('PUT')--}}

        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" id="name" required autofocus>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email"  required>
        </div>
        <div class="form-group">
          <label for="major" class="form-label">Major</label>
          <select class="browser-default custom-select" size="1" name="major" id="major">
          </select>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" name="phone" required id="phone">
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address" required id="address"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="update">
          Update Student
        </button>
        <button type="submit" class="btn btn-secondary">
            <a style = "color: white; text-decoration: none;"href="{{ route('students.index') }}">
               Back </a>
           </button>
      {{--</form>--}}
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                var id = $("#edit").val();
                var url = 'http://localhost:8000/api/students/edit/'+id;
                $.get(url,{id:id},function (data) {
                var name = $("#name").val(data[0].name);
                var email = $("#email").val(data[0].email);
                var phone = $("#phone").val(data[0].phone);
                var address = $("#address").val(data[0].address);
                var major = data[1].forEach(students=>{
                    $("select").append(`
                    <option value="${students.id}"> ${students.name}</option>`);
                    });
                    $(`select option[value="${data[0].major_id}"]`).attr("selected", "selected");
                console.log(data);
                },'json');

                $('#update').click(function(){
                    $.ajax({
                        type: 'post',
                        url: '/api/students/update/'+id,
                        data: {
                        'name':$("#name").val(),
                        'email':$("#email").val(),
                        'major_id':$("#major").val(),
                        'phone':$("#phone").val(),
                        'address':$("#address").val()
                        },
                        success: function(data) {
                        location.reload();
                        location.href='http://localhost:8000/shows';
                        }
                    });
                });
    });
</script>
@endsection
