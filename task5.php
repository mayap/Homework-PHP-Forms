<?php

require_once 'functions.php';

$degrees = getValue($_POST, 'degrees');
$convFrom = getValue($_POST, 'degreesSelectFrom');
$convTo = getValue($_POST, 'degreesSelectTo');

$result = 0;
$output = '';

if ($convFrom == 'c' && $convTo == 'f') {
	$result = (9/5) * $degrees + 32;
	$output = 'Degrees in F: ';
} else if ($convFrom == 'f' && $convTo == 'c') {
	$result = (5/9) * $degrees - 32*(5/9);
	$output = 'Degrees in C: ';
} else if ($convFrom == $convTo && $convTo == 'c') {
	$result = $degrees;
	$output = 'Degrees in C: ';
} else if ($convFrom == $convTo && $convTo == 'f') {
	$result = $degrees;
	$output = 'Degrees in F: ';
}

var_dump($_SERVER['REQUEST_METHOD']);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Task2</title>
		<style>
			input {
				width: 60px;
			}
			
			#submit {
				width: 60px;
			}
			
			select {
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
	
	<form action="" method="post">
			<span>
				<label for="degrees">Enter degrees:</label>
				<input type="text" id="degrees" name="degrees" />
			</span>
			
			<span>
			in:
				<select name="degreesSelectFrom" id="degreesSelectFrom">
					<option>--Choose option to convert from--</option>
					<?= options([
							'c' => 'C',
							'f' => 'F',
					], $degrees)
						
					?>
				</select>
				
			</span>
			<br />
			<span>
			Convert degrees to:
				<select name="degreesSelectTo" id="degreesSelectTo">
					<option>--Choose option to convert to--</option>
					<?= options([
							'c' => 'C',
							'f' => 'F',
					], $degrees)
						
					?>
				</select>
				
			</span>

			<input type="submit" id="submit" />
			
			<p>
				<?php 
					if ($_POST) {
						echo $output . $result;
					}
					
				?>
			</p>
		</form>
	</body>
</html>