<?php
// Início da sessão
session_start();

// String de conexão com o banco de dados
include_once("conexao.php")
;
// Botão de login (POST)
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	
	if((!empty($usuario)) AND (!empty($senha))){
		// Consulta no banco de dados
		$result_usuario = "SELECT * FROM funcionario WHERE email = '$usuario' AND senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		
		// Se a consulta retonar algum resultado
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			echo $row_usuario['senha'];
			if($senha == $row_usuario['senha']){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];				
				$_SESSION['cargo'] = $row_usuario['cargo'];				
				$_SESSION['email'] = $row_usuario['email'];
				
				// Redireciona para a página inicial
				header("Location: loading.php");
			}else{
				// Volta para a tela de login e exibe uma mensagem de erro
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: login.php");
			}
		}
	}else{
		// Volta para a tela de login e exibe uma mensagem de erro
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: login.php");
	}
}else{
	// Volta para a tela de login e exibe uma mensagem de erro
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login.php");
}
