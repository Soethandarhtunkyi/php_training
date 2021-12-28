<?php
session_start();
if(isset($_POST["sendcode"])){
  $email=$_POST["email"];
  $randomCode=mt_rand(0,999999);
$_SESSION["random"]=$randomCode;
$message="Your reset code is" .$randomCode;
$subject="Reset Code";
$to=$email;
$result=mail($to,$subject,$message);
echo("The code has been sent to"  .$to);
$_SESSION["username"]=$email;
}
if(isset($_POST["verify"])){
  $code=$_POST["verifycode"];
  if($code==$_SESSION["random"]){
    header('location:resetpass.php');
  }else{
    echo("Wrong code");
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REQUEST CODE</title>
</head>
<body>
  <form method="POST">
    <table align="center">
      <h3 align="center" style="color:cornflowerblue;">REQUEST CODE</h3>
      <tr>
        <td>Enter Email</td>
        <td><input type="text" name="email" placeholder="example@gmail.com"></td>

      </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" name="sendcode" value="SEND"></td>

      </tr>
      <tr>
        <td>Verify Code</td>
        <td><input type="text" name="verifycode" placeholder="123456"></td>

      </tr>
      <tr>
        <td></td>
        <td align="right"> <input type="submit" name="verify" value="Verify Code" style="color:orangered;"></td>
      </tr>
    </table>
  </form>
</body>
</html>