<?php
	if(@$_GET['id']){
		$id = $_GET['id'];
		$action="categoria-alterar.php?id=$id";
	}else{
		$action="categoria-salvar.php";
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
			<h1>Cadastrar Categorias</h1>
			<form class="form-salvar" action="<?php echo $action?>" method="post">
				<input type="text" placeholder="Categoria" name="txCategoria" value="<?php echo @$_GET['categoria'];?>">
				<input type="submit" value="Salvar">
			</form>
		</div>
	</div>

	<div>	
		<?php
			$stmt = $pdo->prepare("select * from tbcategoria");	
			$stmt ->execute();
		?>
		<div>
			<h1>Tabela de Categorias</h1>
			<table class="table">
				<thead>
					<th>Id Categoria</th>
					<th>Categoria</th>
					<th>Controle</th>
					<th></th>
				</thead>
				<tbody>
					<?php
						while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
							echo "<tr>";				
								echo "<td>$row[0] </td>";
								echo "<td>$row[1] </td>";					
								echo "<td>";
									echo "<a href='categoria-excluir.php?id=$row[0]'>Excluir</a>";
								echo "</td>";
								echo "<td class='td-especial'>";
									echo "<a href='categoria-exibir.php?id=$row[0]&categoria=$row[1]'>Atualizar</a>";
								echo "</td>";
							echo "</tr>";				
						}	
					?>	
				</tbody>		
			</table>
		</div>	
	</div>
</section>
