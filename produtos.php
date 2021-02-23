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

$sql = "SELECT * FROM produto";
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
	<h2>Produtos</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastroproduto.php" class="btn btn-success mb-5">Cadastrar produto</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">Nome</th>
		  <th scope="col">Categoria</th>
		  <th scope="col">Preço</th>
		  <th scope="col">Ações</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["nome"];?></td>
		  <td><?php echo $row["categoria"];?></td>
		  <td><?php echo $row["preco"];?></td>
		  <td>
			<a href='produto.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-success">Informações</a>
			<a href="editarproduto.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $row['nome']; ?> do sistema?')" value="Excluir" href="excluirProduto.php?id=<?php echo $row['id']; ?>">Excluir</a>
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