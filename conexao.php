
<?php
	$servidor="localhost";
	$banco="crud";
	$usuario="root";
	$senha="root";

    $pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
?>