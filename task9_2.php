<?php
require_once 'functions.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Task9_2</title>
	</head>
	<body>
		<div>
			<?php 
			//Using POST
			if ($_POST) {
				$var_value4 = getValue($_POST, 'var4');
				$var_value5 = getValue($_POST, 'var5');
				echo $var_value4, "<br />", $var_value5;
				
			} else {
				//Using GET
				$var_value1 = getValue($_GET, 'var1');
				$var_value2 = getValue($_GET, 'var2');
				$var_value3 = getValue($_GET, 'var3');
				//$var_value2 = $_GET['var1'];
				//$result = $var_value2;
				echo $var_value1, "<br />", $var_value2, "<br />", $var_value3;
			}
			?>
		</div>
	</body>
</html>