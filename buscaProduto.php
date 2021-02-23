<?php

$servername = "localhost";
$database = "easypetbd";
$username = "root";
$password = "admin123";

//Criando a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

//Checando conexão
if (!$conn) {
    die("Falha na conexão: " . mysli_connect_error());
}

$palavra = $_POST['palavra'];

$sql = "SELECT * FROM PRODUTO WHERE nome LIKE '%$palavra%'";


$query = mysqli_query($conn, $sql);
$qtd = mysqli_num_rows($query);
?>

<?php
	if ($qtd > 0) {
		echo '<table class="table table-hover table-dark" id="table-id">
						<thead>
							<tr>
								<th scope="col">Nome do produto</th>
								<th scope="col">Preco</th>
								<th scope="col">Acao</th>
							</tr>
						</thead>
						<tbody>';		
		if(isset($query)) {
			$i = 0;
			while($row = $query->fetch_assoc()) {
				echo '<tr>';
				echo '<td class="nomeProduto">';
				echo $row["nome"];
				echo '</td>';
				echo '<td class="precoProduto">';
				echo $row["preco"];
				echo '</td>';
				echo '<td>';
				echo '<a class="btn btn-sm btn-success" value="'. $row['preco'] .'" onclick="myFunction('. $i .')">Adicionar</a>';
				echo '</td>';
				echo '</tr>';
				$i = $i + 1;;
			}
		}
		echo '</tbody>
			</table>';
	}
?>














