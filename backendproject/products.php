<?php 
	require_once ('shop-bd.php');
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		$id=intval($_GET['id_products']); 
		if(isset($_SESSION['cart'][$id])){  
			$_SESSION['cart'][$id]['quantity']++;  
		}else{
			$stmt=$pdo->prepare("SELECT * FROM products WHERE id_products = :uid");
			$stmt->execute(['uid'=>$id]);
			$products_cart=$stmt->fetchAll(PDO::FETCH_ASSOC);  
			if(!empty($products_cart)){ 
				foreach($products_cart as $product){
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
	<h1>Аккаунты</h1> 
	<?php 
		if(isset($message)){ 
			echo "<h2>$message</h2>"; 
		} 
	?> 
	<div class="card-body">
		<form action="shop.php" method="post">
			<div class="field-group">
				<input name="search" type="text" placeholder="Enter search term..." />
				<button type="submit">Искать</button>
			</div>
		</form>
    </div>
	<table> 
		<tr> 
			<th>Название</th> 
			<th>Категория</th> 
			<th>Цена</th> 
			<th>Действие</th>
			<?php if(isset($_SESSION['user'])&&$_SESSION['user']['role']=='admin') echo "<th>Редактировать</th>"?>
		</tr> 
		<?php
			foreach($products as $product){  
		?> 
			<tr> 
			    <td><a href="<?php echo 'shopitem.php?id='.$product['id_products']; ?>"><?php echo $product['name'] ?></a></td> 
			    <td><?php 
			    	$stmt2=$pdo->prepare("SELECT name FROM categories WHERE category_id=:ucat_id");
					$stmt2->execute(['ucat_id'=>$product['category_id']]);
					$category=$stmt2->fetch(PDO::FETCH_ASSOC);
					echo $category['name']; 
					?>
				</td>  
			    <td><?php echo $product['price'] ?>руб.</td> 
			    <td><a href="shop.php?page=products&action=add&id_products=<?php echo $product['id_products']; ?>">Добавить в корзину</a></td> 
			<?php if(isset($_SESSION['user'])&&$_SESSION['user']['role']=='admin') echo "<td><form action='deleteProduct.php' method='POST'><input type='hidden' name='id' value='".$product['id_products']."'><button type='submit'>Удалить</button></form><form action='changeProductForm.php?id_products=".$product['id_products']."' method='POST'><input type='hidden' name='id' value='".$product['id_products']."'><button type='submit'>Изменить</button></form></td>";?>
			</tr> 
		<?php 	 
			} 
		?>  
	</table>
	<?php if(isset($_SESSION['user'])&&$_SESSION['user']['role']=='admin') echo "<form action='createProductForm.php' method='POST'><button type='submit'>Добавить товар</button></form></td>";?>