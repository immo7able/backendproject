<?php
	session_start();
	if(isset($_SESSION['user']) and $_SESSION['user']['role']=='admin'){
		
	}
	else
		header("Location: index.php");
?>
<html>
	<head>
		<title> Profile </title>
		<?php
		require_once('common/inhead.php');?>
	</head>
	<body>
		<!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
		<div class="center profile-page">
		<?php
			
			try{
				$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
			}catch(PDOException $exception){
				echo $exception->getMessage();
			}
		?> 
		<?php 
			if(isset($_SESSION['status']) 
				&& $_SESSION['status'] == 'success'): ?>

			<div class="message">
				<?= $_SESSION['message']; ?> <br>
			</div>

			<?php endif; ?>

			<?php
			$hasBanErrors = false;
			if(isset($_SESSION['status']) 
				&& $_SESSION['status'] == 'errors_ban')
				$hasBanErrors = true;

			?>
			<form action="banUser.php" method="post">
				<div class="field-group">
					<label for="name">Name</label>
					<input value="" id="name" name="name" type="text" style="width:50%;">
					<?php if($hasBanErrors && isset($_SESSION['errors_ban']['name'])): ?>
					<div class="error">
						<?= $_SESSION['errors_ban']['name'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
					<label for="time">Время бана в секундах</label>
					<input type="text" name="time" id="time" value="0" style="width:50%;">
					<?php if($hasBanErrors && isset($_SESSION['errors_ban']['time'])): ?>
					<div class="error">
						<?= $_SESSION['errors_ban']['time'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
					<button type="submit">Забанить</button>
				</div>
			</form>
			<?php
			$stmt=$pdo->query("SELECT * FROM blacklist");
			$bans = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($bans)){
		?>
		<table> 
		<tr> 
			<th>ID пользователя</th> 
			<th>Дата бана</th> 
			<th>Время бана в секундах</th> 
		</tr> 
		<?php
			foreach($bans as $ban){
				$total=0;				
		?> 
			<tr> 
			    <td><?php echo $ban['user_id']; ?></td> 
			    <td><?php echo $ban['bandate']; ?></td> 
			    <td><?php echo $ban['bantime']; ?></td> 
			</tr> 
		<?php 	 
			} 
		?>  
		</table>
		<?php 	 
			}else
				echo "<div class='field-group'>Банов нет</div>";
		?> 
		</div>
	<!-- Footer Section Begin -->
	<?php require_once('common/footer.php'); ?>
	<!-- Footer Section End -->
	</body>
	<?php
	
			unset($_SESSION['message']);
			unset($_SESSION['status']);
			unset($_SESSION['errors_category']);
		?>
</html>