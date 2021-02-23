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

$sql = "SELECT animal.id, animal.nome_animal FROM animal INNER JOIN cliente ON (animal.id_cliente = cliente.id) WHERE cliente.cpf =" . $palavra;

$query = mysqli_query($conn, $sql);
$qtd = mysqli_num_rows($query);
?>

<?php
	if ($qtd > 0) {
		echo '<label for="inputAnimal">Animais</label>';
		echo '<select class="form-control" name="inputAnimal" id="inputAnimal">';
		if(isset($query)) {
			while($row = $query->fetch_assoc()) {
				echo "<option value=" . $row['id'] . ">" . $row['nome_animal'] . "</option>";
			}
		}
		echo '</select>';	
	} else {
		echo '<b>Nenhum animal encontrado, tente novamente</b>';
	}
?>