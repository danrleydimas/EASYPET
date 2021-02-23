<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$fornecedor = filter_input(INPUT_POST, 'inputFornecedor', FILTER_SANITIZE_STRING);
$especie = filter_input(INPUT_POST, 'inputEspecie', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'inputPreco', FILTER_SANITIZE_STRING);
$imagem = filter_input(INPUT_POST, 'inputFoto', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'inputDescricao', FILTER_SANITIZE_STRING);

if ( isset( $_FILES[ 'inputFoto' ][ 'name' ] ) && $_FILES[ 'inputFoto' ][ 'error' ] == 0 ) {
    echo 'Você enviou o inputFoto: <strong>' . $_FILES[ 'inputFoto' ][ 'name' ] . '</strong><br />';
    echo 'Este inputFoto é do tipo: <strong > ' . $_FILES[ 'inputFoto' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'inputFoto' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'inputFoto' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $inputFoto_tmp = $_FILES[ 'inputFoto' ][ 'tmp_name' ];
    $nomeFoto = $_FILES[ 'inputFoto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nomeFoto, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = 'produto / ' . $novoNome;
 
        // tenta mover o inputFoto para o destino
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
	$sql = "SELECT * FROM fornecedor WHERE id = " . $fornecedor;
	$result = mysqli_query($conn, $sql);
	$resultFornecedor = mysqli_fetch_assoc($result);
	$nomeFantasia = $resultFornecedor['nomeFantasia'];

	$result_produto = "INSERT INTO produto (nome, fornecedor, especie, preco, imagem, categoria, descricao, fornecedor_produto) VALUES ('$nome', '$nomeFantasia', '$especie', '$preco', '$novoNome','$categoria', '$descricao', '$fornecedor')";
	
	
	$resultado_produto = mysqli_query($conn, $result_produto);	
	

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Produto cadastrado com sucesso</h5></div>';
		header("Location: cadastroProduto.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Produto não foi cadastrado com sucesso</h5></div>';	
		header("Location: cadastroProduto.php");	
	}


?>



