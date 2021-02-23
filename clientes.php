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

$sql = "SELECT * FROM cliente";
$result = mysqli_query($conn, $sql);
?>

	

	<!-- Início de Clientes -->
	
	<div class="m-5">
		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>
	<h2>Clientes</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastrocliente.php" class="btn btn-success mb-5">Cadastrar Cliente</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">Nome</th>
		  <th scope="col">Telefone</th>
		  <th scope="col">Email</th>
		  <th scope="col">Ações</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["nome"];?></td>
		  <td><?php echo $row["telefone"];?></td>
		  <td><?php echo $row["email"];?></td>
		  <td>
			<a href='cliente.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-success">Informações</a>
			<a href="editarcliente.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $row['nome']; ?> do sistema?')" value="Excluir" href="excluirCliente.php?id=<?php echo $row['id']; ?>">Excluir</a>
			<a href="cadastroAnimal.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Cadastrar Animal</a>
		  </td>
		</tr>
		<?php
			} 
			mysqli_close($conn);
		?>
	  </tbody>
	</table>
	
	
	<img href="profile/1.png">
	
	
	
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
	<!-- Fim de Clientes -->

<?php
include_once("footer.php");
?>