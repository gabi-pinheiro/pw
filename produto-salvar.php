<?php

$produto = $_POST['txProduto'];
$idCat = $_POST['txIdCategoria'];
$valor = $_POST['txValor'];

include("conexao.php");

$stmt = $pdo->prepare("insert into tbproduto values(null,'$produto','$idCat','$valor');");	
$stmt ->execute();

header("location:produto-exibir.php");
?>