<?php

require_once 'functions.php';

$numbers = getValue($_POST, 'numbers');

function validateForm(&$errors) {
	global $numbers;

	if (!validateRequiredField($numbers)) {
		$errors['numbers'][] = 'Enter first number';
	}
	
	return !empty($errors);
}

$validationErrors = [];
if ($_POST) {
	validateForm($validationErrors);
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Task4</title>
		<style>
			#numbers {
				width: 300px;
				margin-bottom: 10px;
			}
			
			.error {
				color: red;
			}
			
			.error input {
				border-color: red;
			}
		</style>
		
	</head>
	<body>
		<form action="" method="post">
			<div class = "<?= getErrorClass($validationErrors, 'numbers') ?>">
				<label for="numbers">Enter 10 numbers separated with commas:</label>
					<input type="text" id="numbers" name="numbers" />
				
				<?= getFieldErrors($validationErrors, 'numbers')?>
			</div>
			
			
			
			<input type="submit" id="submit" />
			
		</form>
		<br />
		<?php 
			if ($_POST) {
				$nums = explode(',', $numbers);
				sort($nums);
				$min = $nums[0];
				$max = $nums[0];
				for ($i = 0; $i < 10; $i++) {
					if ($min > $nums[$i]) {
						$min = $nums[$i];
					}
					if ($max < $nums[$i]) {
						$max = $nums[$i];
					}
				}
				echo 'Sorted numbers: ';
				foreach ($nums as $value) {
					echo $value, ' ';
				}
				echo '<p></p>';
				echo 'Min number: ', $min, ' Max number: ', $max;
			}
		?>
		
	</body>
</html>