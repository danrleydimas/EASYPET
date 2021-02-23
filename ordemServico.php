<?php
require("header.php");
// Deletar cliente
if (isset($_POST['delete'])) {
		$deleteID = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$query = "DELETE FROM cliente WHERE id = {$deleteID}";
		if (mysqli_query($conn, $query)) {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Cliente excluído com sucesso</h5></div>';
			mysqli_close($conn);
			header("Location: clientes.php");
		} else {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Não foi possível excluir o funcionário</h5></div>';
			header("Location: clientes.php");

		}
}

$sql = "SELECT * FROM ordemServico";
$result = mysqli_query($conn, $sql);
?>

	

	<!-- Início de OS -->
	
	<div class="m-5">
		<!-- div com a mensagem para o usuário -->
		<div class="container-fluid">
			<div><?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
					unset($_SESSION['msg']);
				}
			?>
			</div>	
		</div>

	<h2>Ordem de serviço</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastroos.php" class="btn btn-success mb-5">Cadastrar Ordem de Serviço</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">Tipo</th>
		  <th scope="col">Data / Horário</th>
		  <th scope="col">Ações</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["tipoServico"];?></td>
		  <td><?php echo $row["data"];?></td>
		  <td>
			<a href='cliente.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Observações</a>
			<a href="editarOS.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir a OS do sistema?')" value="Excluir" href="excluirOS.php?id=<?php echo $row['id']; ?>">Excluir</a>
		  </td>
		</tr>
		<?php
			} 
			mysqli_close($conn);
		?>
	  </tbody>
	</table>
	
	
	
	<!-- Start Pagination -->
	<div class='pagination-container' >
		<nav>
			 <ul class="pagination list-group list-group-horizontal" style="cursor: pointer;">
				<li data-page="prev" class="list-group-item"><span> < <span class="sr-only">(current)</span></span></li>
				 <!--	Here the JS Function Will Add the Rows -->
				 <li data-page="next" id="prev" class="list-group-item success"><span> > <span class="sr-only">(current)</span></span></li>
			</ul>
		</nav>
	</div>
	<!-- End of Pagination -->
	
	</div>
	<!-- Fim de OS -->

<?php
include_once("footer.php");
?>