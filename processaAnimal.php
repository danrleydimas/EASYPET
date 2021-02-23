<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$especie = filter_input(INPUT_POST, 'inputEspecie', FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST, 'inputRaca', FILTER_SANITIZE_STRING);
$idade = filter_input(INPUT_POST, 'inputIdade', FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST, 'inputPeso', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'inputSexo', FILTER_SANITIZE_STRING);
$IDCliente = filter_input(INPUT_POST, 'inputIDCliente', FILTER_SANITIZE_STRING);

if (isset($_POST['inputProntuario'])) {

	$pathToSave = 'prontuarios/';
	"/pasta onde quer salvar/";

	/*Checa se a pasta existe - caso negativo ele cria*/
	if (!file_exists($pathToSave)) {
		mkdir($pathToSave);
	}

	if ($_FILES) { // Verificando se existe o envio de arquivos.

		if ($_FILES['inputProntuario']) { // Verifica se o campo não está vazio.
			$dir = $pathToSave; // Diretório que vai receber o arquivo.
			$tmpName = $_FILES['inputProntuario']['tmp_name']; // Recebe o arquivo temporário.

			$name = $_FILES['inputProntuario']['name']; // Recebe o nome do arquivo.
			preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
			if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms'))) {
				$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Permitido apenas arquivos doc,xls,pdf e txt.</h5></div>';
				header('Location: clientes.php');
				die;
			}

			if (move_uploaded_file($tmpName, $dir.$name)) { // move_uploaded_file irá realizar o envio do arquivo.        
				echo('Arquivo adicionado com sucesso.');
			} else {
				echo('Erro ao adicionar arquivo.');
			}    
		}  
	}

}

if (isset($tmpName)) {
	$result_cliente = "INSERT INTO animal (nome_animal, especie, raca, idade, peso, sexo, id_cliente, prontuario) VALUES ('$nome', '$especie', '$raca','$idade', '$peso','$sexo', '$IDCliente', '$name')";
} else {
	$result_cliente = "INSERT INTO animal (nome_animal, especie, raca, idade, peso, sexo, id_cliente) VALUES ('$nome', '$especie', '$raca','$idade', '$peso','$sexo', '$IDCliente')";	
}


$resultado_cliente = mysqli_query($conn, $result_cliente);
		
if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Animal cadastrado com sucesso</h5></div>';
		header("Location: clientes.php");
} else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Animal não foi cadastrado com sucesso</h5></div>';	
		echo $result_cliente;
		header("Location: clientes.php");	
}