<?php
require("header.php");

// Deletar produto
if (isset($_POST['delete'])) {
		$deleteID = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$query = "DELETE FROM produto WHERE id = {$deleteID}";
		if (mysqli_query($conn, $query)) {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Produto excluído com sucesso</h5></div>';
			mysqli_close($conn);
			header("Location: produtos.php");
		} else {
			$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Não foi possível excluir o produto</h5></div>';
			header("Location: produtos.php");

		}
}

// Consultando as informações do produto
$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$produto = mysqli_fetch_assoc($result);

?>


	<div class="m-5">
	
			  <div class="row">
			<div class="col-md-4 mb-5">
			  	<h2 class="mb-2">Produto: <?php echo $produto['nome']; ?></h2>
			</div>
			<div class="form-group col-md-4">
					<?php if (!empty($produto['imagem'])) { ?>
			  		<img src="produto/ <?php echo $produto['imagem']; ?>" class="border border-secondary rounded-circle mb-3" alt="img-produto" style="border-width: 3px!important;" width="200px" height="200px">
					<?php } ?>
			</div>
		</div>	
	
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $produto['id']; ?></td>
				</tr>
				<tr>
					<th>Nome</th>
					<td><?php echo $produto['nome']; ?></td>
				</tr>
				<tr>
					<th>Fornecedor</th>
					<td><?php echo $produto['fornecedor']; ?></td>
				</tr>
				<tr>
					<th>Especie</th>
					<td><?php echo $produto['especie']; ?></td>
				</tr>
				<tr>
					<th>Preço</th>
					<td>R$ <?php echo $produto['preco']; ?></td>
				</tr>
				<tr>
					<th>Categoria</th>
					<td><?php echo $produto['categoria']; ?></td>
				</tr>
				<tr>
					<th>Descrição</th>
					<td><?php echo $produto['descricao']; ?></td>
				</tr>
			</table>
			
			<div class="row">
			<div class="col-sm-1">
			<a href="produtos.php" class="btn btn-lg btn-info">Voltar</a>
			</div>
			<div class="col-sm-1">			
			<a href="editarproduto.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success">Editar</a>
			</div>
			<div class="col-sm-1">
			<form method="POST" action="produto.php">
				<input type="hidden" name="delete_id" value="<?php echo $id; ?>"> 
				<input type="submit" name="delete" class="btn btn-lg btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $produto['nome']; ?> do sistema?')" value="Excluir">
			</form>			
			</div>
			</div>
	</div>
	<!-- Fim de Funcionários -->
	
	
	
<?php
include_once("footer.php");
?>