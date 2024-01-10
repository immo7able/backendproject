<!DOCTYPE html>
<?php 
	session_start(); $error='';$regerror='';$message='';
	if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		if(!empty($_SESSION['message'])){echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";$_SESSION['message']='';}
		try{
			$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
		}catch(PDOException $exception){
			echo $exception->getMessage();
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
		<title> Категории </title>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="column4">
                    <div class="breadcrumb-option">
                        <a href="./index.php">Главная</a>
                        <span>Категории</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>Категории</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	
	<!-- Category Section Begin -->
	<section class="category-section">
		<div class="container">
			<div class="row">
				<div class="category-main"> 
					<h1>Категории</h1> 
	<table> 
		<tr> 
			<th>Категория</th> 
			<th>Изображение</th> 
			<th>Редактировать</th>
		</tr> 
		<?php
			$stmt=$pdo->query("SELECT * FROM categories");
			$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($categories as $category){  
		?> 
			<tr> 
			    <td><?php echo $category['name']?></td> 
			    <td><?php echo "<img class='avatar' src='img/category/".$category['avatar']."'>"?></td> 
				<td><form action='deleteCategory.php' method='POST'><input type='hidden' name='category_id' value="<?= $category['category_id'];?>"><button type='submit'>Удалить</button></form>
					<form action="editCategoryForm.php?category_id=<?= $category['category_id'];?>" method='POST'><input type='hidden' name='id' value="<?= $category['category_id']?>"><button type='submit'>Изменить</button></form>
				</td>";?>
			</tr> 
		<?php 	 
			} 
		?>  
	</table>
	<form action='createCategoryForm.php' method='POST'><button type='submit'>Создать категорию</button></form></td>";?>
					
				</div><!--end of main--> 
			</div>
		</div>
	</section>
	<!-- Category Section End -->
	
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