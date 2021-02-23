<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'inputCargo', FILTER_SANITIZE_STRING);
$salario = filter_input(INPUT_POST, 'inputSalario', FILTER_SANITIZE_STRING);
$carteira = filter_input(INPUT_POST, 'inputCarteira', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'inputRG', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'inputCPF', FILTER_SANITIZE_STRING);
$banco = filter_input(INPUT_POST, 'inputBanco', FILTER_SANITIZE_STRING);
$agencia = filter_input(INPUT_POST, 'inputAgencia', FILTER_SANITIZE_STRING);
$conta = filter_input(INPUT_POST, 'inputConta', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'inputCEP', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'inputEndereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'inputNumero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'inputComplemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'inputBairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'inputCidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'inputEstado', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'inputTelefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'inputSenha', FILTER_SANITIZE_STRING);
$reconfirmacao = filter_input(INPUT_POST, 'inputReconfirmacao', FILTER_SANITIZE_STRING);


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
        $destino = 'profile / ' . $novoNome;
 
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



if ($senha == $reconfirmacao) {
	
	if ($cargo == "1- Gerente") {
		$tipo = 1;
	} else {
		$tipo = 2;
	}	
	
	$result_usuario = "INSERT INTO funcionario (nome, tipo, cargo, salario, CTPS, rg, cpf, banco, agencia, conta, foto, cep, endereco, numero, complemento, bairro, cidade, estado, email, telefone, senha) VALUES ('$nome', '$tipo', '$cargo', '$salario', '$carteira','$rg', '$cpf','$banco', '$agencia','$conta', '$novoNome','$cep', '$endereco','$numero', '$complemento','$bairro', '$cidade','$estado', '$email','$telefone', '$senha')";
	
	$resultado_usuario = mysqli_query($conn, $result_usuario);
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Email já cadastrado</h5></div>';	
		header("Location: cadastroFuncionario.php");
	if (mysqli_errno($conn) == 1062) {
		
	} else if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Usuário cadastrado com sucesso</h5></div>';
		header("Location: cadastroFuncionario.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Usuário não foi cadastrado com sucesso</h5></div>';	
		header("Location: cadastroFuncionario.php");	
	}
	} else {
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">A senha e a reconfirmação devem ser iguais</h5></div>';
		header("Location: cadastroFuncionario.php");	
	}



?>



