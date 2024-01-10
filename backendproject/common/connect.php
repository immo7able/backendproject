<?php

	try {
		$pdo = new PDO("mysql:host=localhost;dbname=users;", "root", "");
	}catch(PDOException $ex){
		echo $ex->getMessage();
	}

	function registerUser($email, $password, $login, $role='user', $avatar='no-ava.jpg'){

		global $pdo;
		$queryObj = $pdo->prepare("insert into users(email, password, login, role, avatar) values(:ue, :up, :ul, :ur, :ua)");

		try {
			$queryObj->execute([
				'ue' => $email,
				'up' => md5($password),
				'ul' => $login,
				'ur' => $role,
				'ua' => $avatar,
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}

	function loginUser($email, $password){
		global $pdo;
		$queryObj = $pdo->prepare("select * from users where email = :ue and password = :up");

		$queryObj->execute([
			'ue' => $email,
			'up' => md5($password)
		]);

		$user = $queryObj->fetch(PDO::FETCH_ASSOC);
		return $user;
	}

	function getCategories(){
		global $pdo;
		$queryObj = $pdo->query("select * from categories");
		$categories = $queryObj->fetchAll(PDO::FETCH_ASSOC);
		return $categories;
	}




	function createPost($title, $content, $category_id, $user_id, $status='draft', $image='no-img.jpg'){

		global $pdo;
		$queryObj = $pdo->prepare("insert into posts(title, content, category_id, user_id, status, image, created_at) values(:ptt, :pcn, :pci, :pui, :pst, :pim, :pca)");

		date_default_timezone_set('Asia/Almaty');

		try {
			$queryObj->execute([
				'ptt' => $title,
				'pcn' => $content,
				'pci' => $category_id,
				'pui' => $user_id,
				'pst' => $status,
				'pim' => $image,
				'pca' => date("Y-m-d H:i:s", time()),
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}

	function getPosts($catId = null){
		global $pdo;

		if($catId){
			$queryObj = $pdo->prepare("select * from posts where category_id = ?");
			$queryObj->execute([$catId]);
		}
		else{
			$queryObj = $pdo->query("select * from posts");
		}

		
		$posts = $queryObj->fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}

	function getOnePost($postId){
		global $pdo;

		$queryObj = $pdo->prepare("select * from posts where id = ?");
		$queryObj->execute([$postId]);

		$post = $queryObj->fetch(PDO::FETCH_ASSOC);
		return $post;
	}

	function editPost($id, $title, $content, $category_id, $status='draft', $image='no-img.jpg'){

		global $pdo;
		$queryObj = $pdo->prepare("update posts SET title=:ptt, content=:pcn, category_id=:pci, status=:pst, image=:pim where id=:pid");

		try {
			$queryObj->execute([
				'pid' => $id,
				'ptt' => $title,
				'pcn' => $content,
				'pci' => $category_id,
				'pst' => $status,
				'pim' => $image,
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}

	function deletePost($postId){
		global $pdo;

		$queryObj = $pdo->prepare("delete from posts where id = ?");
		$result = $queryObj->execute([$postId]);

		return $result;
	}

?>