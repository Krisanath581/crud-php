<?php 

include("../connection/connect.php");

$iduser = $_GET['iduser'];

$sql = "SELECT * FROM users WHERE id = '$iduser'";

$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$checkPassword = $result["password"];

print_r($checkPassword);
return;

// $sql = "UPDATE `users` SET `password`=:password WHERE id = :id";

// $stmt = $conn->prepare($sql);

// $stmt->bindParam(':password', $password, PDO::PARAM_STR);


?>
