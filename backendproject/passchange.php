<?php
 session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$oldpassword = md5($_POST['oldpassword']) ?? '';
		$newpassword = $_POST['newpassword']??'';
		$newpassword_repeat = $_POST['newpassword_repeat']??'';
		
		$errors = [];
		if($oldpassword!=$_SESSION['user']['password'])
			$errors['oldpassword']='Wrong password';
		if(empty($newpassword))
			$errors['newpassword'][] = 'Password is empty';
		if(strlen($newpassword)<6)
			$errors['newpassword'][]='Password is less than 6 symbols';
		if(!preg_match("/([0-9]+)/", $newpassword))
			$errors['newpassword'][]='Needs at least 1 digit';
		if(!preg_match("/([a-z]+)/", $newpassword))
			$errors['newpassword'][]='Needs at least 1 lower register';
		if(!preg_match("/([A-Z]+)/", $newpassword))
			$errors['newpassword'][]='Needs at least 1 upper register';
		if($newpassword!=$newpassword_repeat)
			$errors['newpassword'][]='New passwords doesnt match';
		if($errors){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = $errors;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: profile.php");
		}
		else{
			$stmt=$pdo->prepare("UPDATE users SET password=:up WHERE id=:uid");
			try{
				$stmt->execute(['up'=>md5($newpassword), 'uid'=>$_SESSION['user']['id']]);
			}catch(PDOException $exc){
				echo $exc->getMessage();
			}
			$_SESSION['user']['password']=md5($newpassword);
			$_SESSION['status'] = 'success';
			$_SESSION['message']='Пароль успешно изменен';
			header("Location: profile.php");
		}
	}
?>