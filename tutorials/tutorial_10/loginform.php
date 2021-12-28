<?php
require "forgotpasscon.php";

if(isset($_POST["login"])){
  $username=$_POST["user"];
  $password=$_POST["pass"];
  $query="SELECT `username` , `password` FROM  `forgotpass` WHERE username='" .$username."' and password= '" .$password. "'";
  $result_query=mysqli_query($conn,$query);
  if($result_query){
    if(mysqli_num_rows($result_query)){
      header('location: ../tutorial_09/index.php');
    }else{
      echo ("There is no such rows in database");
    }
  }else{
    echo("No result");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
</head>
<body>
  <form method="POST">
    <table align="center">
      <h3 align="center" style="color:blueviolet;">LOGIN FORM</h3>
      <tr>
        <td>Username</td>
        <td> <input type="text" name="user" placeholder="username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td> <input type="text"  name="pass" placeholder="password"></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"> <input type="submit" name="login" value="LOGIN"></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"> <a href="sendcode.php"><u>Reset password?</u></a></td>
      </tr>
    </table>
  </form>
</body>
</html>