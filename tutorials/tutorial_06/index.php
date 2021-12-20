<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Upload Image</title>
</head>

<body style="background: #40E0D0;  
background: -webkit-linear-gradient(to right, #FF0080, #FF8C00, #40E0D0);  
background: linear-gradient(to right, #FF0080, #FF8C00, #40E0D0);">
  <form action="#" method="post" enctype="multipart/form-data">
    Type Folder Name:<input type="text" name="foldername" /><br /><br />
    Select Image to Upload: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br /><br />
    <input type="Submit" value="Upload" name="upload" />
  </form>


  <?php
  if (isset($_POST['upload'])) {
    if ($_POST['foldername'] != "") {
      $foldername = $_POST['foldername'];
      if (!is_dir($foldername)) mkdir($foldername);
      foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
          move_uploaded_file($_FILES['files']['tmp_name'][$i], $foldername . "/" . $name);
        }
      }
      echo "Folder is successfully uploaded";
    } else
      echo "Upload folder name is empty";
  }
  ?>
</body>

</html>