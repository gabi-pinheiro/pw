<?php
    $id = $_GET['id'];

    include("conexao.php");
    $stmt = $pdo->prepare("delete from tbproduto where idproduto='$id'");	
	$stmt ->execute();

    header("location:produto-exibir.php");
?>