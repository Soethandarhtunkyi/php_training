<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout Page</title>
</head>

<body>
  <?php
  session_start();
  unset($_SESSION['user']);
  header('location: ../tutorial_10/login-user.php');
  ?>
</body>

</html>
