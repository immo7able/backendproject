<?php session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		$stmt2=$pdo->query("SELECT * FROM categories");
		$categories=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		$category_ids=[];
		$i=0;
		foreach($categories as $cat){
			$category_ids[$i]=$cat['category_id'];
			$i++;
		}
		$id_products = $_POST['id_products'] ?? '';
		$name = $_POST['name'] ?? '';
		$description = $_POST['description'] ?? '';
		$price = $_POST['price'] ?? '';
		$category_id=$_POST['category_id']?? '';
		
		$errors_product = [];
		
		if(empty($name))
			$errors_product['name'] = 'Name is empty';
		if(empty($description))
			$errors_product['description'] = 'Description is empty';
		if(empty($price))
			$errors_product['price'] = 'Price is empty';
		else if(!is_numeric($price))
			$errors_product['price'] = 'Wrong type of price';
		else if($price<=0)
			$errors_product['price'] = 'Price cant be <=0';
		if(empty($category_id))
			$errors_product['category_id'] = 'Wrong category';
		else if(!in_array($category_id, $category_ids))
			$errors_product['category_id'] = 'Wrong category number';
		if($errors_product){
			$_SESSION['status'] = 'error_product';
			$_SESSION['errors_product'] = $errors_product;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: createProductForm.php");
		}
		else{
			$queryObj = $pdo->prepare("INSERT INTO products(name, description, price, category_id) VALUES (:pn, :pd, :pp, :pc)");
			try {
				$queryObj->execute([
					'pn' => $name,
					'pd' => $description,
					'pp' => $price,
					'pc' => $category_id,
				]);
			}catch(PDOException $ex){
				echo $ex->getMessage();
			}
			$_SESSION['status'] = 'success';
			$_SESSION['message']='Товар успешно создан';
			header("Location: shop.php");
		}
	}
	else
		header("Location: shop.php");
?>