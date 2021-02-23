<?php
require("header.php");

// Deletar fornecedor
if (isset($_POST['delete'])) {
		$deleteID = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$query = "DELETE FROM fornecedor WHERE id = {$deleteID}";
		if (mysqli_query($conn, $query)) {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Fornecedor excluído com sucesso</h5></div>';
			mysqli_close($conn);
			header("Location: fornecedores.php");
		} else {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Não foi possível excluir o fornecedor</h5></div>';
			header("Location: fornecedores.php");

		}
}

// Consultando as informações do fornecedor
$id = $_GET['id'];
$sql = "SELECT * FROM fornecedor WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$fornecedor = mysqli_fetch_assoc($result);

// Consultando as informações dos produtos
$sql2 = "SELECT produto.* FROM produto INNER JOIN fornecedor ON(produto.fornecedor_produto = fornecedor.id) WHERE fornecedor.id =" . $id;
$result2 = mysqli_query($conn, $sql2);

?>


	<div class="m-5">
	
		   <div class="row">
			<div class="col-md-4 mb-5">
			  	<h2 class="mb-2">Fornecedor: <?php echo $fornecedor['nomeFantasia']; ?></h2>
			</div>
		</div>	
	
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $fornecedor['id']; ?></td>
				</tr>
				<tr>
					<th>Razão Social</th>
					<td><?php echo $fornecedor['razaoSocial']; ?></td>
				</tr>
				<tr>
					<th>CNPJ</th>
					<td><?php echo $fornecedor['CNPJ']; ?></td>
				</tr>
				<tr>
					<th>Banco</th>
					<td><?php echo $fornecedor['banco']; ?></td>
				</tr>
				<tr>
					<th>Agência</th>
					<td><?php echo $fornecedor['agencia']; ?></td>
				</tr>
				<tr>
					<th>Conta</th>
					<td><?php echo $fornecedor['conta']; ?></td>
				</tr>
				<tr>
					<th>CEP</th>
					<td><?php echo $fornecedor['CEP']; ?></td>
				</tr>
				<tr>
					<th>Endereço</th>
					<td><?php echo $fornecedor['endereco']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $fornecedor['email']; ?></td>
				</tr>
				<tr>
					<th>Telefone</th>
					<td><?php echo $fornecedor['telefone']; ?></td>
				</tr>
				
			</table>
			
			<div class="row">
			<div class="col-sm-1">
			<a href="fornecedores.php" class="btn btn-lg btn-info">Voltar</a>
			</div>
			<div class="col-sm-1">			
			<a href="editarfornecedor.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success">Editar</a>
			</div>
			<div class="col-sm-1">
			<form method="POST" action="fornecedor.php">
				<input type="hidden" name="delete_id" value="<?php echo $id; ?>"> 
				<input type="submit" name="delete" class="btn btn-lg btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $fornecedor['nomeFantasia']; ?> do sistema?')" value="Excluir">
			</form>			
			</div>
			</div>
	<!-- Fim de fornecedores -->
	
	<div class="row">
			<div class="col-md-4 mt-5 mb-5">
			  	<h2 class="mb-2">Produtos:</h2>
			</div>
	</div>	
		<table class="table table-striped table-condensed mb-5">
		  <thead>
			<tr>
			  <th scope="col">Nome</th>
			  <th scope="col">Categoria</th>
			  <th scope="col">Preço</th>
			  <th scope="col">Ações</th>
			</tr>
	  </thead>
	  <?php
		while($produto = $result2->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $produto["nome"];?></td>
		  <td><?php echo $produto["categoria"];?></td>
		  <td><?php echo $produto["preco"];?></td>
		  <td>
			<a href="produto.php?id=<?php echo $produto['id']; ?>" class="btn btn-sm btn-success">Informações</a>
			<a href="editarproduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger text-white" onclick="return confirm('Tem certeza que deseja excluir <?php echo $produto['nome']; ?> do sistema?')" value="Excluir" href="excluirproduto.php?id=<?php echo $produto['id']; ?>">Excluir</a>
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