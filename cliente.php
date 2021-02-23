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

// Consultando as informações do cliente
$id = $_GET['id'];
$sql = "SELECT * FROM cliente WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$cliente = mysqli_fetch_assoc($result);

// Consultando as informações dos animais
$sql = "SELECT animal.* FROM animal INNER JOIN cliente ON(animal.id_cliente = cliente.id) WHERE cliente.id = " . $id;
$result = mysqli_query($conn, $sql);

?>


	<div class="m-5">
	
			  <div class="row">
			<div class="col-md-4 mb-5">
			  	<h2 class="mb-2">Cliente:<br/><br/> <?php echo $cliente['nome']; ?></h2>
			</div>
		</div>	
	
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $cliente['id']; ?></td>
				</tr>
				<tr>
					<th>Telefone</th>
					<td><?php echo $cliente['telefone']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $cliente['email']; ?></td>
				</tr>
				<tr>
					<th>RG</th>
					<td><?php echo $cliente['rg']; ?></td>
				</tr>
				<tr>
					<th>CPF</th>
					<td><?php echo $cliente['cpf']; ?></td>
				</tr>				
				<tr>
					<th>CEP</th>
					<td><?php echo $cliente['cep']; ?></td>
				</tr>
				<tr>
					<th>Endereço</th>
					<td><?php echo $cliente['endereco']; ?></td>
				</tr>
				<tr>
					<th>Número</th>
					<td><?php echo $cliente['numero']; ?></td>
				</tr>
				<tr>
					<th>Complemento</th>
					<td><?php echo $cliente['complemento']; ?></td>
				</tr>
				<tr>
					<th>Bairro</th>
					<td><?php echo $cliente['bairro']; ?></td>
				</tr>
				<tr>
					<th>Cidade</th>
					<td><?php echo $cliente['cidade']; ?></td>
				</tr>
				<tr>
					<th>Estado</th>
					<td><?php echo $cliente['estado']; ?></td>
				</tr>
				<tr>
					<th>Animais</th>
					<td><?php echo $result->num_rows; ?></td>
				</tr>
				
			</table>
		<div class="row mt-5 mb-5">
			<div class="col-sm-1">
			<a href="clientes.php" class="btn btn-lg btn-info">Voltar</a>
			</div>
			<div class="col-sm-1">			
			<a href="editarcliente.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success">Editar</a>
			</div>
			<div class="col-sm-1">
			<form method="POST" action="cliente.php">
				<input type="hidden" name="delete_id" value="<?php echo $id; ?>"> 
				<input type="submit" name="delete" class="btn btn-lg btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $cliente['nome']; ?> do sistema?')" value="Excluir">
			</form>			
			</div>
			</div>
			
		 <div class="row">
			<div class="col-md-4 mt-5 mb-5">
			  	<h2 class="mb-2">Animais:</h2>
				<a href="cadastroAnimal.php?id=<?php echo $id; ?>" class="btn btn-success mt-4">Cadastrar Animal</a>
			</div>
		</div>	
		<table class="table table-striped table-condensed mb-5">
		  <thead>
			<tr>
			  <th scope="col">Nome</th>
			  <th scope="col">Espécie</th>
			  <th scope="col">Raça</th>
			  <th scope="col">Idade</th>
			  <th scope="col">Sexo</th>
			  <th scope="col">Peso (kg)</th>
			  <th scope="col">Ações</th>
			</tr>
	  </thead>
	  <?php
		while($animal = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $animal["nome_animal"];?></td>
		  <td><?php echo $animal["especie"];?></td>
		  <td><?php echo $animal["raca"];?></td>
		  <td><?php echo $animal["idade"];?></td>
		  <td><?php echo $animal["sexo"];?></td>
		  <td><?php echo $animal["peso"];?></td>
		  <td>
			<?php if ($animal['prontuario'] != "") { ?>
				<a href="downloadProntuario.php/?filename=prontuarios/<?php echo $animal['prontuario']; ?>" class="btn btn-sm btn-info" download>Baixar prontuário</a>
			<?php } ?>
			<a href="editarAnimal.php?id=<?php echo $animal['ID']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger text-white" onclick="return confirm('Tem certeza que deseja excluir <?php echo $animal['nome_animal']; ?> do sistema?')" value="Excluir" href="excluirAnimal.php?id=<?php echo $animal['ID']; ?>">Excluir</a>
		  </td>
		</tr>
		<?php
			} 
			mysqli_close($conn);
		?>
	  </tbody>
		</table>
			


	</div>
	
	
	
<?php
include_once("footer.php");
?>