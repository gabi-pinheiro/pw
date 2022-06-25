<?php
include("conexao.php");

$id = $_GET['id'];
$produto = $_POST['txProduto'];
$idCat = $_POST['txIdCategoria'];
$valor = $_POST['txValor'];

$stmt = $pdo->prepare("UPDATE tbproduto SET produto='$produto', idCategoria=$idCat, valor=$valor WHERE idproduto=$id");	
$stmt ->execute();

header("location:produto-exibir.php");
?>