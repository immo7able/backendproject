
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
		$remember = $_POST['remember']??'';
		
		$errors = [];
		
		if(!empty($remember))
			setcookie('email', $email, time()+30,'/');
		else 
			setcookie('email', '', time()-30,'/');
		if(empty($email))
			$errors['email'] = 'Email is empty';
		else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				$errors['email'] = 'Email is not valid';
		}

		if(empty($password))
			$errors['password'][] = 'Password is empty';
		if(strlen($password)<6)
			$errors['password'][]='Password is less than 6 symbols';
		
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$stmt=$pdo->prepare("SELECT * FROM users WHERE email = :uemail");
		$stmt->execute(['uemail'=>$email]);
		$users=$stmt->fetch(PDO::FETCH_ASSOC);
		$queryObj = $pdo->prepare("SELECT * FROM blacklist WHERE user_id=:uid");
		$queryObj->execute([
			'uid' => $users['id'],
		]);
		$ban=$queryObj->fetch(PDO::FETCH_ASSOC);
		print_r($ban);
		if(!empty($ban)){
			$bandate=strtotime($ban['bandate']);
			$bantime=$ban['bantime'];
			echo time()." ";
			echo $bandate." ";
			echo $bantime." ";
			if(time()+18000-$bandate-$bantime>0){
				$queryObj = $pdo->prepare("DELETE FROM blacklist WHERE user_id=:uid");
				$queryObj->execute([
					'uid' => $users['id'],
				]);
			}
			else 
				$errors['ban']='You are banned';
		}
		if($users['email']==$email AND $users['password']==$password){	
			$_SESSION['status'] = 'success';
			$_SESSION['message'] = 'You have signed in successfully';
			$_SESSION['user'] = $users;
			header("Location: index.php");
		}
		else{
			$errors['password'][]='Invalid password or email';
		}
		if($errors){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = $errors;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: loginform.php");
		}
			/*foreach($users as $a){
				if($a['email']==$_POST['email'] and $a['password']==$_POST['password']){
					$_SESSION['status'] = 'success';
					$_SESSION['message'] = 'You have signed in successfully';
					$_SESSION['user'] = $a['name'];
					header("Location: profile.php");
				}
			}*/
	}

?>