<?php
$conn = new mysqli("localhost", "root", "");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
mysqli_select_db($conn, "users");
?>