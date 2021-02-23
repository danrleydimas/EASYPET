<?php
require("header.php");
// Deletar funcionario
if (isset($_POST['delete'])) {
		$deleteID = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$query = "DELETE FROM funcionario WHERE id = {$deleteID}";
		if (mysqli_query($conn, $query)) {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Funcionário excluído com sucesso</h5></div>';
			mysqli_close($conn);
			header("Location: funcionarios.php");
		} else {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Não foi possível excluir o funcionário</h5></div>';
			header("Location: funcionarios.php");

		}
}

$sql = "SELECT * FROM funcionario";
$result = mysqli_query($conn, $sql);
?>

	<!-- Início de Funcionários -->
	
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
	<h2>Funcionários</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastroFuncionario.php" class="btn btn-success mb-5">Cadastrar Funcionário</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">Nome</th>
		  <th scope="col">Cargo</th>
		  <th scope="col">Salário</th>
		  <th scope="col">CTPS</th>
		  <th scope="col">RG</th>
		  <th scope="col">CPF</th>
		  <th scope="col">Endereço</th>
		  <th scope="col">CEP</th>
		  <th scope="col">Email</th>
		  <th scope="col">Telefone</th>
	
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["nome"];?></td>
		  <td><?php echo $row["cargo"];?></td>
		  <td><?php echo $row["salario"];?></td>
		  <td><?php echo $row["ctps"];?></td>
		  <td><?php echo $row["rg"];?></td>
		  <td><?php echo $row["cpf"];?></td>
		  <td><?php echo $row["endereco"];?></td>
		  <td><?php echo $row["cep"];?></td>
		  <td><?php echo $row["email"];?></td>
		  <td><?php echo $row["telefone"];?></td>
		  <td>
			<a href='funcionario.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-success">Informações</a>
			<a href="editarFuncionario.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $row['nome']; ?> do sistema?')" value="Excluir">Excluir</a>
			<!--<a href="#" class="btn btn-sm btn-danger deletarBtn" data-target="#deletarModal">Excluir</a>-->
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
	<!-- Fim de Funcionários -->



	<script>
		$(document).ready(function(){
			$(".deletarBtn").click(function(){
				$("#deletarModal").modal('show');
			});
		});
	</script>


<?php
include_once("footer.php");
?>






