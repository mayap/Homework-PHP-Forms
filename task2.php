<?php
	require_once 'functions.php';
	
	$username = getValue($_POST, 'username');
	$password = getValue($_POST, 'password');
	$rep_password = getValue($_POST, 'rep_password');
	
	function validateForm(&$errors) {
		global $username, $password, $rep_password;
		
		if (!validateRequiredField($username)) {
			$errors['username'][] = 'Username required.';
		} else if (!validateLength($username, 4)) {
			$errors['username'][] = 'Username must be 4 characters long.';
		}
		
		if (!validateRequiredField($password)) {
			$errors['password'][] = 'Password required.';
		} else if (!validateLength($password, 6)) {
			$errors['password'][] = 'Password must be 6 characters long.';
		}
		
		if (!validateRequiredField($rep_password)) {
			$errors['rep_password'][] = 'Repeated password required.';
		} else if (!validateLength($rep_password, 6)) {
			$errors['rep_password'][] = 'Repeated password must be 6 characters long.';
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
		<title>Task2</title>
		<link rel="stylesheet" type="text/css" href="styles1.css" />
	</head>
	<body>
		<form action="" method="post">
			<div class = "<?= getErrorClass($validationErrors, 'username') ?>">
				<label for="username">Username:</label>
					<input 
						type="text" 
						name="username" 
						id="username" 
						value="<?= htmlentities($username)?>" 
						/>
				
				<?= getFieldErrors($validationErrors, 'username')?>
			</div>
			<div class = "<?= getErrorClass($validationErrors, 'password') ?>">
				<label for="password">Password:</label>
					<input 
						type="password" 
						name="password" 
						id="password" 
						/>
				
				<?= getFieldErrors($validationErrors, 'password')?>
			</div>
			<div class = "<?= getErrorClass($validationErrors, 'rep_password') ?>">
				<label for="rep_password">Repeat Password:</label>
					<input 
						type="password" 
						name="rep_password" 
						id="rep_password" 
						/>
				
				<?= getFieldErrors($validationErrors, 'rep_password')?>
			</div>
			<br />
			<input type="submit" />
			<br />
			<br />
			<div id="pass-result">
				<?php if ($password && $rep_password && !getFieldErrors($validationErrors, 'password') &&
						!getFieldErrors($validationErrors, 'rep_password')) {
							if ($password === $rep_password) { ?>
				
				The passwords match.
				
				<?php 
						} else { 
				?>
				
				The passwords don't match.					
				
				<?php }}
					$cryptedPass1 = crypt($password, '$1$pp$');
					$cryptedPass2 = crypt($rep_password, '$1$repp$');
				?>
				
				<br />
				
				<?php
					if ($password && $rep_password && $username && !getFieldErrors($validationErrors, 'username') &&
						!getFieldErrors($validationErrors, 'password') &&
						!getFieldErrors($validationErrors, 'rep_password')) :
				?>
				
				<p>Username: </p>
			 	<?= $username ?>
				<p>Crypted passwords: </p>
				<?= $cryptedPass1 ?>
				<br />
				<?= $cryptedPass2 ?>
				<?php endif; ?>
				
			</div>
		</form>
	</body>
</html>