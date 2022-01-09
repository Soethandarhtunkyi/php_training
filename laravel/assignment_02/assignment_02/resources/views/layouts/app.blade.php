<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Assignment 2</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-weight: 400;
      line-height: 1.6;
      color: #212529;
      text-align: left;
      background-color: #f6f8ff;
    }

    .fa-btn {
      margin-right: 6px;
    }

    .navbar-laravel {
      box-shadow: 0 5px 8px rgba(0, 0, 0, .08);
    }

    .nav-item {
      padding-left: 40px;
    }

    .navbar-brand,
    .nav-link,
    .my-form,
    .login-form {
      font-family: Raleway, sans-serif;
    }

    .my-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .my-form .row {
      margin-left: 0;
      margin-right: 0;
    }

    .login-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .login-form .row {
      margin-left: 0;
      margin-right: 0;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Student List</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('students.create') ? 'hide' : '' }}" href="{{ route('students.create') }}">
                Create Student
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  @yield('content')
</body>

</html>