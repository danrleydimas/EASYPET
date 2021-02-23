<?php
session_start();
include_once("conexao.php");

$totalOS = filter_input(INPUT_POST, 'inputTotalOS', FILTER_SANITIZE_STRING);
$totalProduto = filter_input(INPUT_POST, 'inputTotalProduto', FILTER_SANITIZE_STRING);
$total = filter_input(INPUT_POST, 'inputTotal', FILTER_SANITIZE_STRING);
$nomeAtendente = filter_input(INPUT_POST, 'inputAtendente', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'inputCPF', FILTER_SANITIZE_STRING);

$result_pedido = "INSERT INTO pedido (cpf_cliente, valorOS, valorProduto, valorTotal, data, nome_atendente) VALUES ('$cpf', '$totalOS', '$totalProduto', '$total', CURRENT_TIMESTAMP() , '$nomeAtendente')";
	
$resultado_pedido = mysqli_query($conn, $result_pedido);	

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Pedido efetuado com sucesso<br>Clique em "Recibo" para imprimí-lo</h5></div>';		
		header("Location: pedidos.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Pedido não foi cadastrado com sucesso</h5></div>';	
		header("Location: pedidos.php");	
	}

?>