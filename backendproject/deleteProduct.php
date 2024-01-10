<?php
	session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		$id=$_POST['id'];
		$stmt=$pdo->prepare("DELETE FROM products WHERE id_products=:uid");
		try{
			$stmt->execute(['uid'=>$id]);
		}catch(PDOException $exc){
			echo $exc->getMessage();
		}
		$_SESSION['status'] = 'success';
		$_SESSION['message']='Товар успешно удален';
		header("Location: shop.php");
	}else
		header("Location: shop.php");
 ?>