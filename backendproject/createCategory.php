<?php session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		$name = $_POST['name'] ?? '';
		$errors_category = [];
		$avatar = $_FILES['avatar']; 
        $avatar_name = $category_id . $avatar['name']; 
        $avatar_tmp_name = $avatar['tmp_name']; 
        $avatar_destination_path = 'img/category/' . $avatar_name;

        $allowed_files = ['png', 'jpg', 'jpeg', 'webp'];
        $extention = explode('.', $avatar_name); 
        $extention = end($extention); 
        if(in_array($extention, $allowed_files)){
            if($avatar['size'] < 1000000){
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
            }else{
            	$errors_category['avatar'] = "File Size Too Big. Chose Less Than 1mb File..!";
            }
        }else{
            $errors_category['avatar'] = "File Should Be PNG, JPG, JPEG or WEBP";
        }
		if(empty($name))
			$errors_category['name'] = 'Name is empty';
		if($errors_category){
			$_SESSION['status'] = 'errors_category';
			$_SESSION['errors_category'] = $errors_category;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: createCategoryForm.php");
		}
		else{
			$queryObj = $pdo->prepare("INSERT INTO categories(name, avatar) VALUES (:pn, :pa)");
			try {
				$queryObj->execute([
					'pn' => $name,
					'pa'=> $avatar_name,
				]);
			}catch(PDOException $ex){
				echo $ex->getMessage();
			}
			$_SESSION['status'] = 'success';
			$_SESSION['message']='Категория успешно создана';
			header("Location: shop.php");
		}
	}
	else{
		header("Location: shop.php");
	}
?>