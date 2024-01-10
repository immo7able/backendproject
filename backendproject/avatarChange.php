<?php
	session_start();
	try{
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=backendproject;port=3306;","root","");
	}catch(PDOException $exception){
		echo $exception->getMessage();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$errors=[];
		$avatar = $_FILES['avatar']; 
        $avatar_name = $_SESSION['user']['email'] . $avatar['name']; 
        $avatar_tmp_name = $avatar['tmp_name']; 
        $avatar_destination_path = 'img/users/' . $avatar_name;

        $allowed_files = ['png', 'jpg', 'jpeg', 'webp'];
        $extention = explode('.', $avatar_name); 
        $extention = end($extention); 
        if(in_array($extention, $allowed_files)){
            if($avatar['size'] < 1000000){
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
            }else{
            	$errors['avatar'] = "File Size Too Big. Chose Less Than 1mb File..!";
            }
        }else{
            $errors['avatar'] = "File Should Be PNG, JPG, JPEG or WEBP";
        }
		
		if($errors){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = $errors;
			header("Location: profile.php");
		}
		else{
			try{
				$stmt=$pdo->prepare("UPDATE users SET avatar=:uavatar WHERE id=:uid");
				$stmt->execute(['uavatar'=>$avatar_name,'uid'=>$_SESSION['user']['id']]);
			}catch(PDOException $exc){
				echo $exc->getMessage();
			}	
			$_SESSION['status'] = 'success';
			$_SESSION['message']='Фотография успешно загружена!';
			header("Location: profile.php");
		}
	}
?>