<?php 
 

	try {
		$pdo = new PDO("mysql:host=localhost;dbname=backendproject;", "root", "");
	}catch(PDOException $ex){
		echo $ex->getMessage();
	}
	
 
?>