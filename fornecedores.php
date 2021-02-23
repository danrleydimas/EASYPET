<?php
require("header.php");

$sql = "SELECT * FROM fornecedor";
$result = mysqli_query($conn, $sql);
?>


	<!-- Início de fornecedores -->
	
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
	<h2>Fornecedores</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastrofornecedor.php" class="btn btn-success mb-5">Cadastrar fornecedor</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">Nome fantasia</th>
		  <th scope="col">Email</th>
		  <th scope="col">Telefone</th>
		  <th scope="col">Endereço</th>
		  <th scope="col">Ações</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["nomeFantasia"];?></td>
		  <td><?php echo $row["email"];?></td>
		  <td><?php echo $row["telefone"];?></td>
		  <td><?php echo $row["endereco"];?></td>
		  <td>
			<a href='fornecedor.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-success">Informações</a>
			<a href="editarfornecedor.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
			<a type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir <?php echo $row['nome']; ?> do sistema?')" value="Excluir" href="excluirFornecedor.php?id=<?php echo $row['id']; ?>">Excluir</a>
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
	<!-- Fim de fornecedores -->


<?php
include_once("footer.php");
?>






