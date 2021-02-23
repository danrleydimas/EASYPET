<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'inputID', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$idFornecedor = filter_input(INPUT_POST, 'inputFornecedor', FILTER_SANITIZE_STRING);
$especie = filter_input(INPUT_POST, 'inputEspecie', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'inputPreco', FILTER_SANITIZE_STRING);
$foto = filter_input(INPUT_POST, 'inputFoto', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'inputDescricao', FILTER_SANITIZE_STRING);

if ( isset( $_FILES[ 'inputFoto' ][ 'name' ] ) && $_FILES[ 'inputFoto' ][ 'error' ] == 0 ) { 
		$inputFoto_tmp = $_FILES[ 'inputFoto' ][ 'tmp_name' ];
		$nomeFoto = $_FILES[ 'inputFoto' ][ 'name' ];
		$extensao = pathinfo ( $nomeFoto, PATHINFO_EXTENSION );
		$extensao = strtolower ( $extensao );
		if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
			$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = 'profile / ' . $novoNome;
			if ( @move_uploaded_file ( $inputFoto_tmp, $destino ) ) {
				echo 'inputFoto salvo com sucesso em : <strong>' . $destino . '</strong><br />';
				echo ' < img src = "' . $destino . '" />';
			}
			else
				echo 'Erro ao salvar o inputFoto. Aparentemente você não tem permissão de escrita.<br />';
		}
		else
			echo 'Você poderá enviar apenas inputFotos "*.jpg;*.jpeg;*.gif;*.png"<br />';
	}
	else {
		echo 'Você não enviou nenhum inputFoto!';
	}
	
	
	// Nome Fantasia do fornecedor
	$sql = "SELECT * FROM fornecedor WHERE id = " . $idFornecedor;
	$result = mysqli_query($conn, $sql);
	$resultFornecedor = mysqli_fetch_assoc($result);
	$nomeFantasia = $resultFornecedor['nomeFantasia'];

if (!empty($novoNome)) {
		$atualizar_usuario = "UPDATE produto SET nome = '$nome', fornecedor = '$nomeFantasia', especie = '$especie', preco = '$preco', foto = '$novoNome', categoria = '$categoria', descricao = '$descricao', fornecedor_produto = '$idFornecedor' WHERE id = '$id'";
	} else {
		$atualizar_usuario = "UPDATE produto SET nome = '$nome', fornecedor = '$nomeFantasia', especie = '$especie', preco = '$preco', categoria = '$categoria', descricao = '$descricao', fornecedor_produto = '$idFornecedor' WHERE id = '$id'";	
	}
	$resultado_usuario = mysqli_query($conn, $atualizar_usuario);

	if($resultado_usuario){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Produto atualizado com sucesso</h5></div>';
		header("Location: produtos.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Produto não foi atualizado com sucesso</h5></div>';	
		header("Location: produtos.php");	
	}



?>



