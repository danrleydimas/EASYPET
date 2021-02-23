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

$palavra2 = $_POST['palavra2'];

$sql = "SELECT ordemServico.* FROM cliente INNER JOIN animal ON(animal.id_cliente = cliente.id) INNER JOIN ordemservico ON (ordemservico.idAnimal = animal.ID) WHERE ordemservico.em_debito = 1 AND cliente.cpf =". $palavra2;


$sql2 = "SELECT SUM(ordemServico.preco) AS preco FROM cliente INNER JOIN animal ON(animal.id_cliente = cliente.id) INNER JOIN ordemservico ON (ordemservico.idAnimal = animal.ID) WHERE ordemservico.em_debito = 1 AND cliente.cpf =". $palavra2;

$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn, $sql2);
$qtd = mysqli_num_rows($query);
?>

<?php
	if ($qtd > 0) {
		while ($row2 = $query2->fetch_assoc()) {
			echo '<table class="table table-hover table-dark" id="' . $row2['preco'] . '">';
			echo '<thead>';
			echo '<tr>';
			echo '<th scope="col">Numero da OS</th>';
			echo '<th scope="col">Preco</th>';
			echo '</tr>';
			echo '</thead>';				
			echo '<tbody>';		
			if(isset($query)) {
				$i = 0;
				while($row = $query->fetch_assoc()) {
					echo '<tr>';
					echo '<td class="nomeOS">';
					echo $row["id"];
					echo '</td>';
					echo '<td class="precoOS">';
					echo $row["preco"];
					echo '</td>';
					echo '</tr>';
					$i = $i + 1;;
				}
			}
		echo '</tbody>';
		echo '</table>';
		echo '<script>
		document.getElementById("totalOS").innerHTML = ' . $row2["preco"] .'
		document.getElementById("inputTotalOS").value = document.getElementById("totalOS").innerHTML;
		if (document.getElementById("total").innerHTML == "") {
			document.getElementById("total").innerHTML = 0;
		}
		if (document.getElementById("total").innerHTML == document.getElementById("totalProduto").innerHTML || document.getElementById("total").innerHTML == 0) {
			document.getElementById("total").innerHTML = parseInt(document.getElementById("total").innerHTML) + '. $row2["preco"] .';	
		}
		</script>';	
		}	
	}
?>


