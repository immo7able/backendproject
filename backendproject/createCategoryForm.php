<!DOCTYPE html>
<?php 
	session_start();
	$error='';
	$regerror='';
	$message='';
	if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		if(!empty($_SESSION['message'])){
			echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";
			$_SESSION['message']='';
		}
	}
	else
		header("Location: index.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> Создать </title>
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
			<form action="createCategory.php" method="post" enctype="multipart/form-data">
				<div class="field-group">
					<label for="name">Name</label>
					<input value="" id="name" name="name" type="text" style="width:50%;">
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
					<button type="submit">Создать</button>
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