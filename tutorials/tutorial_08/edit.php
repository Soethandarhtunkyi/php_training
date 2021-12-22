<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_08</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.min.css">
</head>

<body>
  <?php
  require_once 'config.php';
  $major_err = "";
  session_start();
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $_SESSION["id"] = $id;
    $sql = "SELECT * FROM students WHERE id=" . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row["student_name"];
    $age = $row["age"];
    $email = $row["email"];
    $phone ="0". $row["phone_number"];
    $major = $row["major"];
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $major = $_POST["major"];
    $id = $_SESSION["id"];
    if ($major == "0") {
      $major_err = "*Please choose major!";
    } else {
      $stmt=$conn->prepare("UPDATE students SET student_name=?,age=?,email=?,phone_number=?,major=? WHERE id=?;");
      $stmt->bind_param("sisisi", $n, $a, $e,$p,$m,$i);
      $n=$name;
      $a=$age;
      $e=$email;
      $p=$phone;
      $m=$major;
      $i=$id;
      $stmt->execute();
      header("location:index.php");
    }
  }
  ?>
  <div class="con">
    <h1 class="title">Student Information Update</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter your name" required>
      <input type="number" name="age" id="age" value="<?php echo $age; ?>" placeholder="Enter your age" required>
      <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
      <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="Enter your phone number: eg. 09xxxxxxxxx" required>
      <?php
      if ($major == "0") {
        echo '<select name="major" id="major">
        <option value="0" selected>Choose Major</option>
        <option value="1">Computer Science</option>
        <option value="2">Business</option>
      </select>';
      } elseif ($major=="1") {
        echo '<select name="major" id="major">
        <option value="0">Choose Major</option>
        <option value="1" selected>Computer Science</option>
        <option value="2">Business</option>
      </select>';
      } else {
        echo '<select name="major" id="major">
        <option value="0">Choose Major</option>
        <option value="1">Computer Science</option>
        <option value="2" selected>Business</option>
      </select>';
      }
      ?>
      <p class="error"><?php echo $major_err; ?></p>
      <br>
      <a href="index.php" class="btn">Cancel</a>
      <input type="submit" value="Update" name="submit" class="btn">
    </form>
  </div>
</body>

</html>