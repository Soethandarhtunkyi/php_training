<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_08</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  require_once 'config.php';
  $major_err = "";
  session_start();
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $_SESSION["id"] = $id;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM students WHERE id=" . $_SESSION['id'];
    session_unset();
    $conn->query($sql);
    header('location:index.php');
  }
  ?>
  <div class="con">
    <p class="title">
      Are you sure to delete this record?
    </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <button type="submit" class="btn yes-btn">YES</button>
      <a href="index.php" class="btn no-btn">NO</a>
    </form>
  </div>
</body>

</html>