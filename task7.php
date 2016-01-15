<?php

function getServerInfo() {
	echo "<table border='1'>";
	foreach ($_SERVER as $key=>$value) {
		echo "<tr>", "<td>", $key, "</td>", "<td>", $value, "</td>", "</tr>"; 
	}
	echo "</table>";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Task7</title>
		<style type="text/css">
			p {
				color: red;
			}
		</style>
	</head>
	<body>
		<div>
			<p>Browser Information:</p>
			<?= $_SERVER['HTTP_USER_AGENT'] ?>
		</div>
		<br />
		<div>
			<p>Server information:</p>
			<?php 
				getServerInfo();
			?>	
		</div>
		<br />
		<div>
			<p>Host Information:</p>
			<?= $_SERVER['HTTP_HOST'] ?>
		</div>
	</body>
</html>