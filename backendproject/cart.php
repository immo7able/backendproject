<?php 
include ('shop-bd.php');
if(isset($_POST['submit']) and isset($_POST['quantity'])){ 
		foreach($_POST['quantity'] as $key => $val) { 
			if($val<=0) { 
				unset($_SESSION['cart'][$key]); 
			}else{ 
				$_SESSION['cart'][$key]['quantity']=$val; 
			} 
		} 
} 
if(isset($_SESSION['user'])){
	if(isset($_SESSION['cart'])){
		if(isset($_POST['order']) and isset($_POST['quantity'])){ 
			foreach($_POST['quantity'] as $key => $val) { 
				if($val<=0) { 
					unset($_SESSION['cart'][$key]); 
				}else{ 
					$_SESSION['cart'][$key]['quantity']=$val; 
				} 
			}
			$stmt=$pdo->query("SELECT max(order_id) AS number FROM orders");
			$count = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($count['number']))
				$order_id=$count['number']+1;
			else
				$order_id=1;
			$user_id=$_SESSION['user']['id'];
			foreach($_SESSION['cart'] as $key => $val){
				$product_id=$key;
				$quantity=$_SESSION['cart'][$key]['quantity'];
				$price=$_SESSION['cart'][$key]['price'];
				$stmt=$pdo->prepare("INSERT INTO orders(order_id, user_id, product_id, quantity, price, date) VALUES (:oo, :ou, :op, :oq, :opr, CURRENT_TIMESTAMP)");
				try{
					$stmt->execute(['oo'=>$order_id, 'ou'=>$user_id, 'op'=>$product_id, 'oq'=>$quantity, 'opr'=>$price]);
				}catch(PDOException $exc){
					echo $exc->getMessage();
				}
			} 
			unset($_SESSION['cart']);
			echo "<script>alert('Товар успешно приобретен');</script>";
		}
	}else
		echo "<script>alert('Корзина пуста');</script>";
}else
	echo "<script>alert('Авторизуйтесь для покупки');</script>"
?> 
<h1>View cart</h1> 
<div class="cart-add custom-btn btn-3"><a href="shop.php?page=products">На страницу аккаунтов</a> </div>
<form method="post" action="shop.php?page=cart"> 
	<table>   
		<tr> 
		    <th>Название</th> 
		    <th>Количество</th> 
		    <th>Стоимость</th> 
		    <th>Итого</th> 
		</tr> 
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
				$totalprice=0; 
				foreach($products as $product){ 
					$subtotal=$_SESSION['cart'][$product['id_products']]['quantity']*$product['price']; 
					$totalprice+=$subtotal; 
		?> 
			<tr> 
				<td><?php echo $product['name'] ?></td> 
				<td><input type="text" name="quantity[<?php echo $product['id_products'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$product['id_products']]['quantity'] ?>" /></td> 
				<td><?php echo $product['price'] ?>руб.</td> 
				<td><?php echo $_SESSION['cart'][$product['id_products']]['quantity']*$product['price'] ?>руб.</td> 
			</tr> 
		<?php 
			}}}else{ 
				echo "<p>Корзина пуста. Добавьте товары.</p>"; 
			}  
		?> 
		<tr> 
			<td colspan="4">Итого: <?php if(isset($totalprice))echo $totalprice; else echo"0"; ?>руб.</td> 
		</tr> 
	</table> 
	<br /> 
	<button class="custom-btn btn-3 cart-add" type="submit" name="submit">Обновить корзину</button> 
	<button class="custom-btn btn-3 cart-add" type="submit" name="order">Приобрести</button>
</form> 
<br /> 
<p>Чтобы удалить товар, измените его количество на 0. </p>