<!DOCTYPE html>

<html>

<head>

  <title>Assignment</title>

</head>

<body>


  <table class="table table-dark table-striped">
    <tr>
      <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Major</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>   
       <td> {{ $student->name }} </td>
       <td> {{ $student->phone }} </td>
       <td> {{ $student->major }} </td>  
      </tr>
      @endforeach
    </tbody>

  </table>
</body>

</html>