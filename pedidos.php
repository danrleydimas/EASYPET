<?php
require("header.php");

$sql = "SELECT * FROM pedido ORDER BY id_pedido DESC";
$result = mysqli_query($conn, $sql);
?>


	<!-- Início de pedidos -->
	
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
	<h2>Pedidos</h2>
	<?php require('search-bar.php'); ?>
	<a href="cadastroPedido.php" class="btn btn-success mb-5">Cadastrar pedido</a>
	<table class="table table-hover table-dark" id="table-id">
	  <thead>
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">CPF do cliente</th>
		  <th scope="col">OS (R$)</th>
		  <th scope="col">Produto (R$)</th>
		  <th scope="col">Total (R$)</th>
		  <th scope="col">Data</th>
		  <th scope="col">Ação</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
		while($row = $result->fetch_assoc()) {
	  ?>
		<tr>
		  <td><?php echo $row["id_pedido"];?></td>
		  <td><?php echo $row["cpf_cliente"];?></td>
		  <td><?php echo $row["valorOS"];?></td>
		  <td><?php echo $row["valorProduto"];?></td>
		  <td><?php echo $row["valorTotal"];?></td>
		  <td><?php echo $row["data"];?></td>
		  <td><a class="btn btn-sm btn-success" href="recibo.php?id=<?php echo $row["id_pedido"];?>">Recibo</a></td>
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






