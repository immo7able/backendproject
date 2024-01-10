<html>
	<head>
		<title> Profile </title>
		<?php session_start();
		require_once('common/inhead.php');?>
	</head>
	<body>
		<!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
		<div class="center profile-page">
		<div class="field-group">
		<?php
			
			try{
				$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
			}catch(PDOException $exception){
				echo $exception->getMessage();
			}
			echo "Welcome ".$_SESSION['user']['login'];
		?>
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
		</div>
		<form action="avatarChange.php" method="POST" enctype="multipart/form-data">
			<div class="field-group">
                    <label for="avatar">User Avatar</label>
                    <input type="file" id="avatar" name="avatar" />
                    <?php if($hasErrors && isset($_SESSION['errors']['avatar'])): ?>
						<div class="error">
							<?= $_SESSION['errors']['avatar'] ?>
						</div>
					<?php endif; ?>
            </div>
			<div class="field-group">
				<button type="submit">Change avatar</button>
			</div>
		</form>
		<form action="passchange.php" method="POST">
			<div class="field-group">
				<label for="password">OLD password</label>
				<input type="password" name="oldpassword" id="password">
		<?php if($hasErrors && isset($_SESSION['errors']['oldpassword'])): ?>
		<div class="error">
			<?php echo $_SESSION['errors']['oldpassword'];?>
		</div>
		<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="password">NEW password</label>
				<input type="password" name="newpassword" id="password">
			</div>
			<div class="field-group">
				<label for="password">Repeat new password</label>
				<input type="password" name="newpassword_repeat" id="password">
		<?php if($hasErrors && isset($_SESSION['errors']['newpassword'])): ?>
		<div class="error">
			<?php foreach($_SESSION['errors']['newpassword'] as $a){
				echo $a.'<br>'; 
			}
			?>
		</div>
		<?php endif; ?>
			</div>
			<div class="field-group">
				<button type="submit">Change password</button>
			</div>
		</form>
		<form action="logout.php" method="POST">
			<div class="field-group">
				<button type="submit">Logout</button>
			</div>
		</form>
		<?php
			$stmt=$pdo->prepare("SELECT * FROM orders WHERE user_id=:uid GROUP BY order_id");
			$stmt->execute(['uid'=>$_SESSION['user']['id']]);
			$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($orders)){
		?>
		<table> 
		<tr> 
			<th>Номер заказа</th> 
			<th>Товары</th> 
			<th>Общая сумма</th> 
			<th>Дата</th>
		</tr> 
		<?php
			foreach($orders as $order){
				$total=0;				
		?> 
			<tr> 
			    <td><?php echo $order['order_id']; ?></td> 
			    <td><?php 
			    	$stmt2=$pdo->prepare("SELECT p.name, o.price, o.quantity  FROM products p, orders o WHERE order_id=:uo_id and p.id_products=o.product_id");
					$stmt2->execute(['uo_id'=>$order['order_id']]);
					$products=$stmt2->fetchAll(PDO::FETCH_ASSOC);
					foreach($products as $product){
						echo $product['name']." ".$product['quantity']."шт. "." x ".$product['price']."руб.<br>";
						$total+=$product['price']*$product['quantity'];
					}						
					?>
				</td>  
			    <td><?php echo $total ?>руб.</td> 
			    <td><?php echo $order['date']; ?></td> 
			</tr> 
		<?php 	 
			} 
		?>  
		</table>
		<?php 	 
			}else
				echo "<div class='field-group'>Заказов нет</div>";
		?> 
		</div>
		<?php

	unset($_SESSION['message']);
	unset($_SESSION['status']);
	unset($_SESSION['errors']);

	?>
	<!-- Footer Section Begin -->
	<?php require_once('common/footer.php'); ?>
	<!-- Footer Section End -->
	</body>
</html>