<?php
session_start();
include_once("conexao.php");

$nomeFantasia = filter_input(INPUT_POST, 'inputNomeFantasia', FILTER_SANITIZE_STRING);
$razaoSocial = filter_input(INPUT_POST, 'inputRazaoSocial', FILTER_SANITIZE_STRING);
$CNPJ = filter_input(INPUT_POST, 'inputCNPJ', FILTER_SANITIZE_STRING);
$banco = filter_input(INPUT_POST, 'inputBanco', FILTER_SANITIZE_STRING);
$agencia = filter_input(INPUT_POST, 'inputAgencia', FILTER_SANITIZE_STRING);
$conta = filter_input(INPUT_POST, 'inputConta', FILTER_SANITIZE_STRING);
$CEP = filter_input(INPUT_POST, 'inputCEP', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'inputEndereco', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'inputTelefone', FILTER_SANITIZE_STRING);

$result_fornecedor = "INSERT INTO fornecedor (nomeFantasia, razaoSocial, CNPJ, banco, agencia, conta, CEP, endereco, email, telefone) VALUES ('$nomeFantasia', '$razaoSocial', '$CNPJ','$banco', '$agencia','$conta', '$CEP', '$endereco', '$email', '$telefone')";


$resultado_fornecedor = mysqli_query($conn, $result_fornecedor);
		
if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Fornecedor cadastrado com sucesso</h5></div>';
		header("Location: fornecedores.php");
} else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Fornecedor não foi cadastrado com sucesso</h5></div>';	
		header("Location: fornecedores.php");	
}