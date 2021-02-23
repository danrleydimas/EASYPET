<?php
session_start();
include_once("conexao.php");

$animal = filter_input(INPUT_POST, 'inputAnimal', FILTER_SANITIZE_STRING);

if ($animal == '') {
	$_SESSION['msg'] = '<div class="bg-warning rounded text-center mt-5 py-2 mb-3" id="msgErro"><h5 class="text-white">A ordem de serviço deve ter um animal associado.</h5></div>';
	header("Location: cadastroOS.php");	
} else {

$tipo = filter_input(INPUT_POST, 'inputTipo', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'inputData', FILTER_SANITIZE_STRING);
$observacoes = filter_input(INPUT_POST, 'inputObservacoes', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'inputPreco', FILTER_SANITIZE_STRING);


$result_os = "INSERT INTO ordemServico (tipoServico, data, preco, observacoes, em_debito, idAnimal) VALUES ('$tipo', '$data', '$preco' ,'$observacoes', 1, '$animal')";
	
$resultado_os = mysqli_query($conn, $result_os);	

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Ordem de serviço cadastrada com sucesso</h5></div>';
		header("Location: ordemServico.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Ordem de serviço não foi cadastrada com sucesso</h5></div>';	
		header("Location: ordemServico.php");	
	}
}

?>