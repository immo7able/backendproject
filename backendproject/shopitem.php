<!DOCTYPE html>
<?php 
	session_start(); $error='';$regerror='';$message='';
	include ('shop-bd.php');
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		$id=intval($_GET['id_products']); 
		if(isset($_SESSION['cart'][$id])){  
			$_SESSION['cart'][$id]['quantity']++;  
		}else{  
			$stmt=$pdo->prepare("SELECT * FROM products WHERE id_products = :uid");
			$stmt->execute(['uid'=>$id]);
			$products=$stmt->fetchAll(PDO::FETCH_ASSOC);  
			if(!empty($products)){ 
				foreach($products as $product){
					$_SESSION['cart'][$product['id_products']]=array( 
						"quantity" => 1, 
						"price" => $product['price'] 
					); 
				}  
			}else{  
				$message="Неправильный id продукта.";  
			} 	 
		}  
	} 
?>
<html>

<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> Аккаунт </title>
		<?php require_once('common/inhead.php')?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
		<?php require_once('common/header.php')?>
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
			<?php 
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$stmt=$pdo->prepare("SELECT * FROM products WHERE id_products = :uid");
				$stmt->execute(['uid'=>$id]);
				$product=$stmt->fetch(PDO::FETCH_ASSOC);
			}else{
				$stmt=$pdo->query("SELECT * FROM products WHERE id_products = 1");
				$product=$stmt->fetch(PDO::FETCH_ASSOC);
			}	
			?> 
				<div class="shop-main"> 
					<div class="account-name"><?php echo $product['name'];  ?> </div>
					<div class="account-description"><?php echo $product['description'];  ?></div>
					<div class="account-price">Цена: <span style="color:#e32879;"><?php echo $product['price'];  ?></span> руб.</div>
					<div class="cart-add custom-btn btn-3"><a href="shopitem.php?id=<?php echo $id; ?>?page=products&action=add&id_products=<?php echo $product['id_products']; ?>">Добавить в корзину</a></div>
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
</body>
</html>