<?php
	session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
		$name=$_POST['name']??'';
		$time=$_POST['time']??'';
		$errors_ban = [];
		if(empty($name))
			$errors_ban['name'] = 'Name is empty';
		if(empty($time))
			$errors_ban['time']='Time is empty';
		if($time<0)
			$errors_ban['time']='Time cannot be <0';
		$queryObj = $pdo->prepare("SELECT id FROM users WHERE login=:un");
			$queryObj->execute([
				'un' => $name,
			]);
		$id=$queryObj->fetch(PDO::FETCH_ASSOC);
		if(empty($id))
			$errors_ban['name']='No user with such nickname';
		$queryObj = $pdo->prepare("SELECT user_id FROM blacklist WHERE user_id=:uid");
			$queryObj->execute([
				'uid' => $id['id'],
			]);
		$id2=$queryObj->fetch(PDO::FETCH_ASSOC);
		print_r($id2);
		if(!empty($id2)){
			$errors_ban['name']='User is already banned';
		}
		if($errors_ban){
			$_SESSION['status'] = 'errors_ban';
			$_SESSION['errors_ban'] = $errors_ban;
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
			header("Location: ban.php");
		}
		else{
			$user_id=$id['id'];
			$queryObj = $pdo->prepare("INSERT INTO blacklist(user_id, bandate, bantime) VALUES (:bid, CURRENT_TIMESTAMP, :bt)");
			try {
				$queryObj->execute([
					'bid' => $user_id,
					'bt'=> $time,
				]);
			}catch(PDOException $ex){
				echo $ex->getMessage();
			}
			$_SESSION['status'] = 'success';
			$_SESSION['message']='Пользователь '.$name.' забанен';
			header("Location: ban.php");
		}
	}else header("Location: index.php");
?>