<?php
include("conexao.php");
session_start();
$user = $_POST['user2'];
$password = $_POST['password2'];
$stmt = $pdo->prepare("select * from tbusuario where usuario='$user' and senha='$password'");
$stmt -> execute();
$row = $stmt->rowCount();
$fetch = $stmt->fetch();

if($row == 1){  
    $_SESSION['login'] = $user;
    $_SESSION['senha'] = $password;
    header("location:pgcontrole.php");
}

else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header("location:login.php");

}
?>
