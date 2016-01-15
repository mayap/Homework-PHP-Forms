<?php

require_once 'functions.php';

$firstNum = getValue($_POST, 'firstNum');
$secondNum = getValue($_POST, 'secondNum');
$operation = getValue($_POST, 'operation');

function validateForm(&$errors) {
	global $firstNum, $secondNum, $operation;

	if (!validateRequiredField($firstNum)) {
		$errors['firstNum'][] = 'Enter first number';
	}

	if (!validateRequiredField($secondNum)) {
		$errors['secondNum'][] = 'Enter second number';
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
		<title>Task1</title>
		<link rel="stylesheet" type="text/css" href="styles2.css" />
	</head>
	<body>
		<form action="" method="post">
			<div class = "<?= getErrorClass($validationErrors, 'firstNum') ?>">
				<label for="firstNum">Enter first number:</label>
					<input type="text" id="firstNum" name="firstNum" />
				
				<?= getFieldErrors($validationErrors, 'firstNum')?>
			</div>
			
			<div class = "<?= getErrorClass($validationErrors, 'secondNum') ?>">
				<label for="secondNum">Enter second number:</label>
					<input type="text" id="secondNum" name="secondNum" />
				
				<?= getFieldErrors($validationErrors, 'secondNum')?>
			</div>
			
			<div>
				<select name="operation" id="operation">
					<option>--Choose operation--</option>
					<?= options([
							'sum' => '+',
							'subtraction' => '-',
							'multiplication' => '*',
							'division' => '/',
					], $operation)
						
					?>
				</select>
				
			</div>
			
			<input type="submit" id="submit" />
			
			<?php 
			if ($operation == 'sum') : ?>
			<p><?= $firstNum + $secondNum; ?></p>
			
			<?php 
			elseif ($operation == 'subtraction') : ?>
			<p><?= $firstNum - $secondNum ?></p>
			
			<?php
			elseif ($operation == 'multiplication') : ?>
			<p><?= $firstNum * $secondNum ?></p>
			
			<?php 
			elseif ($operation == 'division' && $secondNum != 0) : ?>
			<p><?= $firstNum / $secondNum ?>
			
			<?php 
			elseif ($operation == 'division' && $secondNum == 0) : ?>
			<p><?= 'Can\'t divide to zero' ?></p>
			<?php endif; ?>
		</form>
	</body>
</html>