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
		$id=$_GET['category_id'];
		$stmt=$pdo->prepare("SELECT * FROM categories WHERE category_id=:uid");
		$stmt->execute(['uid'=>$id]);
		$category=$stmt->fetch(PDO::FETCH_ASSOC);
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
			$hasCategoryErrors = false;
			if(isset($_SESSION['status']) 
				&& $_SESSION['status'] == 'errors_category')
				$hasCategoryErrors = true;

			?>
			<form action="editCategory.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
				<div class="field-group">
					<label for="titleInput">Name</label>
					<input value="<?= $category['name']?>" id="name" name="name" type="text" style="width:50%;">
					<?php if($hasCategoryErrors && isset($_SESSION['errors_category']['name'])): ?>
					<div class="error">
						<?= $_SESSION['errors_category']['name'] ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="field-group">
                    <label for="avatar">User Avatar</label>
                    <input type="file" id="avatar" name="avatar"/>
                    <?php if($hasCategoryErrors && isset($_SESSION['errors_category']['avatar'])): ?>
						<div class="error">
							<?= $_SESSION['errors_category']['avatar'] ?>
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
			unset($_SESSION['errors_category']);
		?>
	</body>
</html>