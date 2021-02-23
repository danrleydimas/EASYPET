<?php
require("header.php");

// Consultando as informações do funcionario
$id = $_SESSION['id'];
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
			  	<h2 class="mb-5">Meu Perfil:<br/><br/> <?php echo $funcionario['nome']; ?></h2>
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
			<a href="home.php" class="btn btn-lg btn-info">Voltar</a>
			</div>
			<div class="col-sm-2">			
			<a href="alterarSenha.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success">Alterar Senha</a>
			</div>
			</div>
	</div>
	
<?php
include_once("footer.php");
?>