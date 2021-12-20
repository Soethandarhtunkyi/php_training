<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>

<body>
  <?php
  session_start();
  $email = $_POST['email'];
  $password = $_POST['password'];
  if ($email === 'john.doe@gmail.com' and $password === 'jd123pwd') {
    $_SESSION['user'] = ['username' => 'John Doe'];
    header('location: ../profile.php');
  } else {
    header('location: ../index.php?incorrect=1');
  }
  ?>
</body>

</html>