<?php include("conexao.php");
include("head.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

<div class="background">
		<?php
			$stmt = $pdo->prepare("select tbproduto.idProduto, tbproduto.produto, tbcategoria.categoria, tbproduto.valor from tbproduto join tbcategoria on tbcategoria.idCategoria = tbproduto.idCategoria;;");	
			$stmt ->execute();
		?>
	<div id="titulo">
		<h1>Confira os produtos em destaque!</h1>
		<h3 id="subtitulo">Faça login para comprar</h3>
	</div>	
		
		<div class="wrapper">
			
			<table class="cards">
				<thead>
					
					<th>Produto</th>
					<th>Categoria</th>
					<th>Valor</th>
					<th></th>
				</thead>
				<tbody>
					<?php
						while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
							echo "<tr>";				

								echo "<td>$row[1] </td>";
								echo "<td>$row[2] </td>";
								echo "<td>R$ $row[3] </td>";
								echo "<td class='td-especial'>";
									echo "<a href='login.php?id=$row[0]'>Comprar</a>";
								echo "</td>";
							echo "</tr>";				
						}	
					?>	
				</tbody>		
			</table>
		</div>	
	</div>

</body>
</html>