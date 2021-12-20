<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Files Read </title>
</head>

<body>
  <?php

  function phpReadFile($filename)
  {
    $myfile = fopen($filename, "r") or die("Unable to open file!");
    $filecontent = fread($myfile, filesize($filename));
    fclose($myfile);
    return $filecontent;
  }
  echo "<h1 style=text-align:center;> (1)Content of Text File </h1>";
  echo phpReadFile("sample.txt");



  echo "<h1 style=text-align:center;> (2)Content of Excel File </h1>";


  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;

  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


  $spreadsheet = $reader->load("sample.xlsx");

  $d = $spreadsheet->getSheet(0)->toArray();

  echo count($d);

  $sheetData = $spreadsheet->getActiveSheet()->toArray();

  $i = 1;
  unset($sheetData[0]);

  foreach ($sheetData as $t) {
    // process element here;
    echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
    echo $t[0] . "," . $t[1] . "," . $t[2] . "," . $t[3] . "," . $t[4] . "," . $t[5] . "," . $t[6] . "," . $t[7] . " <br>";
    $i++;
  }


  echo "<h1 style=text-align:center;> (3)Content of CSV File </h1>";
  echo '<table border="1">';
  $start_row = 1;
  if (($csv_file = fopen("sample.csv", "r")) !== FALSE) {
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
      $column_count = count($read_data);
      echo '<tr>';
      $start_row++;
      for ($c = 0; $c < $column_count; $c++) {
        echo "<td>" . $read_data[$c] . "</td>";
      }
      echo '</tr>';
    }
    fclose($csv_file);
  }
  echo '</table>';
  ?>

  <div class="container">
    <h2 style="text-align:center;">Contents of doc file</h2>
    <?php
    function readWord($filename)
    {
      if (file_exists($filename)) {
        if (($fh = fopen($filename, 'r')) !== false) {
          $headers = fread($fh, 0xA00);
          $n1 = (ord($headers[0x21C]) - 1);
          $n2 = ((ord($headers[0x21D]) - 8) * 256);
          $n3 = ((ord($headers[0x21E]) * 256) * 256);
          $n4 = (((ord($headers[0x21F]) * 256) * 256) * 256);
          $textLength = ($n1 + $n2 + $n3 + $n4);

          $extracted_plaintext = fread($fh, $textLength);
          return $extracted_plaintext;
        }
      }
    }
    $filename = "sample.doc";
    echo readWord($filename);
    ?>

  </div>


</body>

</html>
