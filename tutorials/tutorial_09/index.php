<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <style type="text/css">
    .wrapper {
      width: 1200px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <h2 class="text-center">PHP CRUD Tutorial Example with Coding Driver</h2>
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Users</h2>
            <a href="create.php" class="btn btn-success pull-right">Add New User</a>
          </div>
          <?php
          // Include config file
          require_once "config.php";

          // select all users
          $data = "SELECT * FROM users";
          if ($users = mysqli_query($conn, $data)) {
            if (mysqli_num_rows($users) > 0) {
              echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
              while ($user = mysqli_fetch_array($users)) {
                $name_pie[] = $user['first_name'];
                $name1_pie[] = $user['last_name'];
                $name[] = $user['first_name'] . $user['last_name'];
                $age_pie[] = $user['age'];
                echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['first_name'] . "</td>
                                            <td>" . $user['last_name'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['phone_number'] . "</td>
                                            <td>" . $user['address'] . "</td>
                                            <td>" . $user['age'] . "</td>
                                            <td>
                                              <a href='read.php?id=" . $user['id'] . "' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=" . $user['id'] . "' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=" . $user['id'] . "' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
              }
              echo "</tbody>
                                </table>";
              mysqli_free_result($users);
            } else {
              echo "<p class='lead'><em>No records found.</em></p>";
            }
          } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }

          // Close connection
          mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>
    <a href="logout.php">Logout</a>
  </div>
  <canvas id="pie-chart" width="800" height="450"></canvas>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
  new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($name); ?>,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
        data: <?php echo json_encode($age_pie); ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Age Show for users'
      }
    }
  });
</script>

</html>