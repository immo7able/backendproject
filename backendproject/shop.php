<!DOCTYPE html>
<?php 
	require_once ('shop-bd.php');
	session_start(); $error='';$regerror='';$message='';
	$search = $_POST['search'] ?? '';
	if($search){
		$queryObj = $pdo->prepare("select * from products p where p.name like :search OR p.description like :search order by p.name asc");
		$queryObj->execute(['search' => '%'.$search.'%']);
		$products = $queryObj->fetchAll(PDO::FETCH_ASSOC);
	}
	else{
		$queryObj = $pdo->query("select * from products order by name asc");
		$products = $queryObj->fetchAll(PDO::FETCH_ASSOC);
	}
	if(!empty($_SESSION['message'])){echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";$_SESSION['message']='';}
	require("shop-bd.php"); 
	if(isset($_GET['page'])){  
		$pages=array("products", "cart"); 
		if(in_array($_GET['page'], $pages)) { 
			$_page=$_GET['page']; 
		}else{ 
			$_page="products"; 
		} 
	}else{ 
		$_page="products"; 
	} 
?>
<html>

<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> Магазин </title>
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
                        <span>Аккаунты</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>Аккаунты</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	
	<!-- Shop Section Begin -->
	<section class="shop-section">
		<div class="container">
			<div class="row">
				<div class="shop-main"> 
					<?php 
					require($_page.".php"); ?>
					
				</div><!--end of main--> 
				<div class="shop-sidebar">
					<h1>Cart</h1> 
						<?php 
							if(isset($_SESSION['cart'])){ 
								$ids="";
								$sql="SELECT * FROM products WHERE id_products IN (";  
								foreach($_SESSION['cart'] as $id => $value) { 
									$ids.=$id;
								}
								if(!empty($ids)){
									foreach($_SESSION['cart'] as $id => $value) { 
									$sql.=$id.","; 
								}
								$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
								$stmt = $pdo->query($sql);
								$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach($products as $product){ 
								?> 
									<p><?php echo $product['name'] ?> x <?php echo $_SESSION['cart'][$product['id_products']]['quantity'] ?></p> 
								<?php  
								} 
							?> 
								<hr /> 
								<div class="cart-add custom-btn btn-3"><a href="shop.php?page=cart">В корзину</a></div> 
							<?php  
							}else 
								echo "<p>Корзина пуста. Добавьте товары.</p>";
							}else{ 
								echo "<p>Корзина пуста. Добавьте товары.</p>"; 
							} 
						?>
				</div><!--end of sidebar--> 
			</div>
		</div>
	</section>
	<!-- Shop Section End -->
	
    <!-- Footer Section Begin -->
		<?php require_once('common/footer.php'); ?>
		<!-- Footer Section End -->
	<?php
		unset($_SESSION['message']);
		unset($_SESSION['status']);
			
	 ?>
</body>

</html>