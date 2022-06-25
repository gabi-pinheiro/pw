<?php

$user = $_POST['user'];
$password = $_POST['password'];

include("conexao.php");

$stmt = $pdo->prepare("insert into tbusuario values(null,'$user', '$password');");
$stmt -> execute();	

header("location:login.php");
?>