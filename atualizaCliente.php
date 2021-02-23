<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'inputID', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'inputTelefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'inputCEP', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'inputRG', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'inputCPF', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'inputEndereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'inputNumero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'inputComplemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'inputBairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'inputCidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'inputEstado', FILTER_SANITIZE_STRING);

$result_cliente = "UPDATE cliente SET nome = '$nome', telefone = '$telefone', email = '$email', cep = '$cep', rg = '$rg', cpf = '$cpf', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado' WHERE id = $id";


$resultado_cliente = mysqli_query($conn, $result_cliente);

		
	if (mysqli_errno($conn) == 1062) {
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Email já cadastrado</h5></div>';	
		header("Location: clientes.php");
	} else if($resultado_cliente){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Cliente atualizado com sucesso</h5></div>';
		header("Location: clientes.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Cliente não foi atualizado com sucesso</h5></div>';	
		header("Location: clientes.php");	
	}
	
	
	