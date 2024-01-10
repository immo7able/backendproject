<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login form page</title>
	<?php require_once('common/inhead.php'); ?>
</head>
<body>
	<!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
	<?php session_start(); ?>
	<div class="center">
	
		<?php 
		if(isset($_SESSION['status']) 
			&& $_SESSION['status'] == 'success'): ?>

		<div class="message">
			<?= $_SESSION['message']; ?> <br>
		</div>

		<?php endif; ?>

		<?php
		$hasErrors = false;
		if(isset($_SESSION['status']) 
			&& $_SESSION['status'] == 'error')
			$hasErrors = true;

		?>
		
		<form action="register.php" method="POST">
			<div class="field-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
	<?php if($hasErrors && isset($_SESSION['errors']['name'])): ?>
		<div class="error">
			<?= $_SESSION['errors']['name'] ?>
		</div>
	<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
	<?php if($hasErrors && isset($_SESSION['errors']['email'])): ?>
		<div class="error">
			<?= $_SESSION['errors']['email'] ?>
		</div>
	<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
		<?php if($hasErrors && isset($_SESSION['errors']['password'])): ?>
		<div class="error">
			<?php foreach($_SESSION['errors']['password'] as $a){
				echo $a.'<br>'; 
			}
			?>
		</div>
	<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="password">Repeat password</label>
				<input type="password" name="password_repeat" id="password">
		<?php if($hasErrors && isset($_SESSION['errors']['password_repeat'])): ?>
		<div class="error">
			<?php foreach($_SESSION['errors']['password_repeat'] as $a){
				echo $a.'<br>'; 
			}
			?>
		</div>
		<?php endif; ?>
			</div>
			<div class="field-group">
				<button type="submit">Register</button>
				<input type="button" onclick="document.location='loginform.php'" value="To login page">
			</div>
		</form>
	</div>
	<!-- Footer Section Begin -->
	<?php require_once('common/footer.php'); ?>
	<!-- Footer Section End -->
	<?php
	
	unset($_SESSION['message']);
	unset($_SESSION['status']);
	unset($_SESSION['errors']);

	?>
</body>
</html>