<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Tutorial 01</title>
		<style>table { width: 400px; border-spacing: 0px;border: 1px solid #000;}</style>
</head>


<body>
	<table>
		<?php
		for ($row = 1; $row <= 8; $row++) {
			echo "<tr>";
			for ($column = 1; $column <= 8; $column++) {
				$total = $row + $column;
				if ($total % 2 == 0) {
					echo "<td height=35px width=30px bgcolor=#FFFFFF></td>";
				} else {
					echo "<td height=35px width=30px bgcolor=#000000></td>";
				}
			}
			echo "</tr>";
		}
		?>
	</table>
</body>

</html>
