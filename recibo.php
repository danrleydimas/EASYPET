<?php

include_once("conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM pedido WHERE id_pedido = " . $id ." ORDER BY id_pedido ";
$result = mysqli_query($conn, $sql);

?>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <body class="bg-light" onload="imprimir()"> 
	<div class="container">
		<div class="bg-light">
			<div class="form-row mt-3">
				<div class="form-group col-md-1">
				<h3>EasyPet</h3>

			</div>
				<div class="form-group col-md-1">
			<img class="ml-3 mb-1" src="img/dog.png" alt="" width="40" height="40">
				</div>
		</div>
		<?php
			while($row = $result->fetch_assoc()) {
		  ?>
		 <h3 class="mt-5">Recibo de compra - Pedido nº<?php echo $row["id_pedido"];?></h3>
		<table class=" mt-5 table table-hover table-active" id="table-id">
		  <tbody>

			<th width="20%">ID</th>
						<td><?php echo $row["id_pedido"];?></td>
					</tr>
					<tr>
						<th>Data do pedido</th>
						<td><?php echo $row["data"];?></td>
					</tr>
					<tr>
						<th>CPF do cliente</th>
						<td><?php echo $row["cpf_cliente"];?></td>
					</tr>
					<tr>
						<th>Valor da Ordem de Serviço (R$):</th>
						<td><?php echo $row["valorOS"];?>.00</td>
					</tr>
					<tr>
						<th>Valor dos produtos comprados (R$):</th>
						<td><?php echo $row["valorProduto"];?>.00</td>
					</tr>
					<tr>
						<th>Valor total da compra (R$):</th>
						<td><?php echo $row["valorTotal"];?>.00</td>
					</tr>
					<tr>
						<th>Pedido efetuado pelo(a) atendente:</th>
						<td><?php echo $row["nome_atendente"];?></td>
					</tr>				
					<tr>
			<?php
				} 
				mysqli_close($conn);
			?>
		  </tbody>
		</table>
	</div>
	
<script>
function imprimir() {
  window.print();
}



</script>	
	
</body>	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	