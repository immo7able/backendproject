<!DOCTYPE html>
<?php 
	session_start();
	$error='';
	$regerror='';
	$message='';
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		$id=$_GET['id_products'];
		$stmt=$pdo->prepare("SELECT * FROM products WHERE id_products=:uid");
		$stmt->execute(['uid'=>$id]);
		$product=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt2=$pdo->query("SELECT * FROM categories");
		$categories=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($_SESSION['message'])){
			echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";
			$_SESSION['message']='';
		}
	}else
		header("Location: shop.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> Изменить </title>
		<?php require_once('common/inhead.php')?>
		
	</head>
	<body>
			<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
		<div class="center">
		<?php 
			if(isset($_SESSION['status']) 
				&& $_SESSION['status'] == 'success'): ?>

			<div class="message">
				<?= $_SESSION['message']; ?> <br>
			</div>

			<?php endif; ?>

			<?php
			$hasProductErrors = false;
			if(isset($_SESSION['status']) 
				&& $_SESSION['status'] == 'error_product')
				$hasProductErrors = true;

			?>
			<form action="changeProduct.php" method="post">
				<input type="hidden" name="id_products" value="<?= $product['id_products'] ?>">
				<div class="field-group">
					<label for="titleInput">Name</label>
					<input value="<?= $product['name']?>" id="name" name="name" type="text" style="width:50%;">
					<?php if($hasProductErrors && isset($_SESSION['errors_product']['name'])): ?>
					<div class="error">
						<?= $_SESSION['errors_product']['name'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" rows="15" style="width:50%;"><?= $product['description']?></textarea>
					<?php if($hasProductErrors && isset($_SESSION['errors_product']['description'])): ?>
					<div class="error">
						<?= $_SESSION['errors_product']['description'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
					<label for="price">Price</label>
					<input value="<?= $product['price']?>" name="price" id="price" type="text">
					<?php if($hasProductErrors && isset($_SESSION['errors_product']['price'])): ?>
					<div class="error">
						<?= $_SESSION['errors_product']['price'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
            		<label for="categoryInput">Выберите категорию</label>
            		<select name="category_id" id="categoryInput">
    				<?php foreach($categories as $cat): ?>
        				<option <?php if($cat['category_id'] == $product['category_id']) echo 'selected' ?> value="<?= $cat['category_id'] ?>"> <?= $cat['name'] ?> </option>
    				<?php endforeach; ?>
            		</select>
            		<?php if($hasProductErrors && isset($_SESSION['errors_product']['category_id'])): ?>
					<div class="error">
						<?= $_SESSION['errors_product']['category_id'] ?>
					</div>
					<?php endif; ?>
        		</div>
				<div class="field-group">
					<button type="submit">Update</button>
				</div>
			</form>
		</div>
		<!-- Footer Section Begin -->
		<?php require_once('common/footer.php'); ?>
		<!-- Footer Section End -->
		<?php
	
			unset($_SESSION['message']);
			unset($_SESSION['status']);
			unset($_SESSION['errors_product']);
		?>
	</body>
</html>