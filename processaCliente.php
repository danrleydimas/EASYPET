<?php
session_start();
include_once("conexao.php");

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

$result_cliente = "INSERT INTO cliente (nome, telefone, email, rg, cpf, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES ('$nome', '$telefone', '$email', '$rg', '$cpf', '$cep', '$endereco','$numero', '$complemento','$bairro', '$cidade','$estado')";


$resultado_cliente = mysqli_query($conn, $result_cliente);

	$resultado_usuario = mysqli_query($conn, $result_usuario);
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Email já cadastrado</h5></div>';	
		header("Location: clientes.php");
		
	if (mysqli_errno($conn) == 1062) {
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Email já cadastrado</h5></div>';	
		header("Location: clientes.php");
		
	} else if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Usuário cadastrado com sucesso</h5></div>';
		header("Location: clientes.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Usuário não foi cadastrado com sucesso</h5></div>';	
		header("Location: clientes.php");	
	}