<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'inputID', FILTER_SANITIZE_STRING);
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

if ($senha == $reconfirmacao) {
	
	if ($cargo == "1- Gerente") {
		$tipo = 1;
	} else {
		$tipo = 2;
	}	
	
	if (!empty($novoNome)) {
		$atualizar_usuario = "UPDATE funcionario SET nome = '$nome', tipo = '$tipo', cargo = '$cargo', salario = '$salario', CTPS = '$carteira', rg = '$rg', cpf = '$cpf', banco = '$banco', agencia = '$agencia', conta = '$conta', foto = '$novoNome', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado', email = '$email', telefone = '$telefone' WHERE id = '$id'";
	} else {
		$atualizar_usuario = "UPDATE funcionario SET nome = '$nome', tipo = '$tipo', cargo = '$cargo', salario = '$salario', CTPS = '$carteira', rg = '$rg', cpf = '$cpf', banco = '$banco', agencia = '$agencia', conta = '$conta', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado', email = '$email', telefone = '$telefone' WHERE id = '$id'";		
	}
	$resultado_usuario = mysqli_query($conn, $atualizar_usuario);

	
	if (mysqli_errno($conn) == 1062) {
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Email já cadastrado</h5></div>';	
		header("Location: funcionarios.php");
	} else if($resultado_usuario){
		$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Funcionário atualizado com sucesso</h5></div>';
		header("Location: funcionarios.php");
	}else{
		$_SESSION['msg'] = '<div class="bg-danger rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Funcionário não foi atualizado com sucesso</h5></div>';	
		header("Location: funcionarios.php");	
	}
	}


?>



