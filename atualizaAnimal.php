<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'inputID', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$especie = filter_input(INPUT_POST, 'inputEspecie', FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST, 'inputRaca', FILTER_SANITIZE_STRING);
$idade = filter_input(INPUT_POST, 'inputIdade', FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST, 'inputPeso', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'inputSexo', FILTER_SANITIZE_STRING);

$result_animal = "UPDATE animal SET nome_animal = '$nome', especie = '$especie', raca = '$raca', idade = '$idade', sexo = '$sexo', peso = '$peso' WHERE ID = $id";


$resultado_cliente = mysqli_query($conn, $result_animal);

if($resultado_cliente){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Animal atualizado com sucesso</h5></div>';
		header("Location: clientes.php");
} else {
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Animal não foi atualizado com sucesso</h5></div>';	
		header("Location: clientes.php");	
}
	
	
	