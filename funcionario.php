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

// Consultando as informações do funcionario
$id = $_GET['id'];
$sql = "SELECT * FROM funcionario WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$funcionario = mysqli_fetch_assoc($result);

?>


	<div class="m-5">
	
			  <div class="row">
			<div class="form-group col-md-2">
					<?php if (!empty($funcionario['foto'])) { ?>
			  		<img src="profile/ <?php echo $funcionario['foto']; ?>" class="border border-secondary rounded-circle mb-3" alt="img-funcionario" style="border-width: 3px!important;" width="200px" height="200px">
					<?php } ?>
			</div>			  
			<div class="col-md-4 mb-5">
			  	<h2 class="mb-2">Funcionário:<br/><br/> <?php echo $funcionario['nome']; ?></h2>
			</div>
		</div>	
	
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $funcionario['id']; ?></td>
				</tr>
				<tr>
					<th>Cargo</th>
					<td><?php echo $funcionario['cargo']; ?></td>
				</tr>
				<tr>
					<th>Salário</th>
					<td><?php echo 'R$ ' . $funcionario['salario']; ?></td>
				</tr>
				<tr>
					<th>Nº da Carteira de Trabalho</th>
					<td><?php echo $funcionario['ctps']; ?></td>
				</tr>
				<tr>
					<th>RG</th>
					<td><?php echo $funcionario['rg']; ?></td>
				</tr>
				<tr>
					<th>CPF</th>
					<td><?php echo $funcionario['cpf']; ?></td>
				</tr>
				<tr>
					<th>Banco</th>
					<td><?php echo $funcionario['banco']; ?></td>
				</tr>
				<tr>
					<th>Agência</th>
					<td><?php echo $funcionario['agencia']; ?></td>
				</tr>
				<tr>
					<th>Nº da Conta</th>
					<td><?php echo $funcionario['conta']; ?></td>
				</tr>
				<tr>
					<th>CEP</th>
					<td><?php echo $funcionario['cep']; ?></td>
				</tr>
				<tr>
					<th>Endereço</th>
					<td><?php echo $funcionario['endereco']; ?></td>
				</tr>
				<tr>
					<th>Número</th>
					<td><?php echo $funcionario['numero']; ?></td>
				</tr>
				<tr>
					<th>Complemento</th>
					<td><?php echo $funcionario['complemento']; ?></td>
				</tr>
				<tr>
					<th>Bairro</th>
					<td><?php echo $funcionario['bairro']; ?></td>
				</tr>
				<tr>
					<th>Cidade</th>
					<td><?php echo $funcionario['cidade']; ?></td>
				</tr>
				<tr>
					<th>Estado</th>
					<td><?php echo $funcionario['estado']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $funcionario['email']; ?></td>
				</tr>
				<tr>
					<th>Telefone</th>
					<td><?php echo $funcionario['telefone']; ?></td>
				</tr>
				
			</table>
			
			<div class="row">
			<div class="col-sm-1">
			<a href="funcionarios.php" class="btn btn-lg btn-info">Voltar</a>
			</div>
			<div class="col-sm-1">			
			<a href="editarFuncionario.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success">Editar</a>
			</div>
			<div class="col-sm-1">
			<form method="POST" action="funcionario.php">
				<input type="hidden" name="delete_id" value="<?php echo $id; ?>"> 
				<input type="submit" name="delete" class="btn btn-lg btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $funcionario['nome']; ?> do sistema?')" value="Excluir">
			</form>			
			</div>
			</div>
	</div>
	<!-- Fim de Funcionários -->
	
	
	
<?php
include_once("footer.php");
?>