<?php

require_once 'functions.php';

$result = '';
$arr = [];
$arrCopy = [];
$word = 'mouse';
$len = strlen($word);
for ($i = 0; $i < $len; $i++) {
	$arr[] = mb_substr($word, $i, 1);
	if ($i == 0 || $i == $len - 1) {
		$arrCopy[] = $arr[$i];
	} else {
		$arrCopy[] = '_';
	}
}
//$index = 0;

if ($_GET) {
	$letter = getValue($_GET, 'input-letter');
	if (in_array($letter, $arr)) {
		for ($i = 0; $i < $len; $i++) {
			if ($arr[$i] == $letter) {
				$index = $i;
				$arrCopy[$i] = $letter;
				continue;
			}
		}
			
	}
}
print_r($arrCopy);


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>HangerMan</title>
		<style>
			button {
				width: 50px;
				margin-left: 50px;
			}
			
			#input-letter {
				margin: 10px 0 10px 9px;
				width: 150px;
			}
			
			label {
				margin-left: 30px;
				font-size: 21px;
			}
		</style>
	</head>
	<body>
		<form method="get">
			<label for="input-letter">Enter a letter:</label>
			<br />
			<input type="text" name="input-letter" id="input-letter" />
			<br />
			<button type="submit">Try!</button>
		</form>
	</body>
</html>