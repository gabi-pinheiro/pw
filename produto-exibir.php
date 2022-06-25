<?php
	if(@$_GET['id']){
		$id = $_GET['id'];
		$action="produto-alterar.php?id=$id";
	}else{
		$action="produto-salvar.php";
	}
?>

<?php 
	include("conexao.php");
	include("menu.php");
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:login.php');
  }

$logado = $_SESSION['login'];
?>

<section>
	<div>
		<div>
			<h1 class= "espaco" >Cadastrar Produtos</h1>
			<form class="form-salvar" action="<?php echo $action?>" method="post">
				<input type="text" placeholder="Produto" name="txProduto" value="<?php echo @$_GET['produto'];?>">
				<input type="text" placeholder="idCategoria" name="txIdCategoria" value="<?php echo @$_GET['categoria'];?>">
				<input type="text" placeholder="Valor" name="txValor" value="<?php echo @$_GET['valor'];?>">
				<input type="submit" value="Salvar">
			</form>
		</div>
	</div>

	<div>
		<?php
			$stmt = $pdo->prepare("select tbproduto.idProduto, tbproduto.produto, tbcategoria.categoria, tbproduto.valor from tbproduto join tbcategoria on tbcategoria.idCategoria = tbproduto.idCategoria;;");	
			$stmt ->execute();
		?>
		<div>
			<h1>Tabela de Produtos</h1>
			<table class="table"> 
				<thead>
					<th>Id</th>
					<th>Produto</th>
					<th>Categoria</th>
					<th>Valor</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					<?php
						while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
							echo "<tr>";				
								echo "<td>$row[0] </td>";
								echo "<td>$row[1] </td>";
								echo "<td>$row[2] </td>";
								echo "<td>R$ $row[3] </td>";
								echo "<td class='td-especial'>";
								echo "<a href='produto-excluir.php?id=$row[0]'>Excluir</a>";
								echo "</td>";
								echo "<td class='td-especial'>";
								echo "<a href='produto-exibir.php?id=$row[0]&produto=$row[1]&categoria=$row[2]&valor=$row[3]'>Atualizar</a>";
								echo "</td>";
							echo "</tr>";				
						}	
					?>	
				</tbody>		
			</table>
		</div>	
	</div>
</section>

