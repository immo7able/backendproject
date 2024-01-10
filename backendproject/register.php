
<?php
	session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';
		$password_repeat = $_POST['password_repeat'] ?? '';
		$name = $_POST['name']??'';
		
		$errors = [];
		
		if(empty($name))
			$errors['name'] = 'Name is empty';
		if(empty($email))
			$errors['email'] = 'Email is empty';
		else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				$errors['email'] = 'Email is not valid';
		}

		if(empty($password))
			$errors['password'][] = 'Password is empty';
		if(empty($password_repeat))
			$errors['password_repeat'][] = 'Password is empty';
		if(strlen($password)<6)
			$errors['password'][]='Password is less than 6 symbols';
		if(!preg_match("/([0-9]+)/", $password))
			$errors['password'][]='Needs at least 1 digit';
		if(!preg_match("/([a-z]+)/", $password))
			$errors['password'][]='Needs at least 1 lower register';
		if(!preg_match("/([A-Z]+)/", $password))
			$errors['password'][]='Needs at least 1 upper register';
		if($password!=$password_repeat)
			$errors['password_repeat'][]='Passwords doesnt match';
		
		if($errors){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = $errors;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: registerform.php");
		}
		else{
			try{
				$stmt=$pdo->prepare("INSERT INTO users(login, email, password, role, avatar) VALUES (:ulogin, :uemail, :upassword, 'user', 'no-ava.png')");
				$stmt->execute(['ulogin'=>$name, 'uemail'=>$email, 'upassword'=>md5($password)]);
			}catch(PDOException $exc){
				echo $exc->getMessage();
				$errors['email']='Email is already registered';
			}	
			if($errors){
				$_SESSION['status'] = 'error';
				$_SESSION['errors'] = $errors;
				header("Location: registerform.php");
			}
			else{
				$_SESSION['status'] = 'success';
				$_SESSION['message']='Вы успешно зарегистрированы! Войдите.';
				header("Location: loginform.php");
			}
		}
	}

?>