<?php
require_once 'config.php';
?>
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
  <div class="container">
    <div class="header clearfix">
      <h1>Student List</h1>
      <a href="add.php">Add New Student</a>
    </div>
    <br>
    <br>
    <?php
    $sql = "select * from students;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) :
    ?>
      <table>
        <tr>
          <th>Id</th>
          <th>Student Name</th>
          <th>Age</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Major</th>
          <th></th>
        </tr>
        <?php

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['student_name'] . "</td>";
          echo "<td>" . $row['age'] . "</td>";
          echo "<td class='email'>" . $row['email'] . "</td>";
          echo "<td>0" . $row['phone_number'] . "</td>";
          if ($row['major'] == "1") {
            echo "<td>Computer Science</td>";
          } else {
            echo "<td>Business</td>";
          }
          echo '<td><a href="edit.php?id=' . $row['id'] . '"><i class="fas fa-edit"></i></a><a href="delete.php?id=' . $row['id'] . '"><i class="fas fa-trash-alt"></i></a></td>';
          echo "</tr>";
        }
        ?>
      </table>
    <?php else : ?>
      <p class="nostu">NO STUDENT YET!</p>
    <?php endif ?>
  </div>
</body>

</html>