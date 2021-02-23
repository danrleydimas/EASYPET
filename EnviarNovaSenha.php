<?php
	session_start();

	require("conexao.php");
	
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	
	$sql = "SELECT * FROM funcionario  where email = '$email'";

	$execute = mysqli_query($conn, $sql);
	
	$num = mysqli_num_rows ($execute);

	if ($num == 1){
		while ($percorrer = mysqli_fetch_array($execute)) {
			$nome = $percorrer['nome'];
		 	$email = $percorrer['email'];				 	
		}		 	
	} else
		$_SESSION['msg'] = "<div class='bg-danger rounded py-2 mb-3' id='msgErro'><h5 class='text-white'>Este e-mail não consta no banco de dados</h5></div>";
		header("Location: recuperarSenha.php");
	
	if ( $num > 0) {
		$novasenha =substr(md5(time()), 0, 6);
		$nscriptografada =(md5($novasenha));
		//$email = $mysqli->escape_string($_POST['email']);

		//if (mail($email,"sua nova senha","Sua nova senha:".$novasenha)) {
	
		require 'PHPMailer/PHPMailerAutoload.php';
	
		$Mailer = new PHPMailer();
	
		//Define que será usado SMTP
		$Mailer->IsSMTP();
	
		//Enviar e-mail em HTML
		$Mailer->isHTML(true);
	
		//Aceitar carasteres especiais
		$Mailer->Charset = 'UTF-8';
	
		//Configurações
		$Mailer->SMTPAuth = true;
		$Mailer->SMTPSecure = 'ssl';
	
		//nome do servidor
		$Mailer->Host = 'smtp.gmail.com';
		//Porta de saida de e-mail 
		$Mailer->Port = 465;
	
		//Dados do e-mail de saida - autenticação
		$Mailer->Username = 'easypetofficial@gmail.com';
		$Mailer->Password = 'Trabalho2';
	
		//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
		$Mailer->From = 'easypetofficial@gmail.com';
	
		//Nome do Remetente
		$Mailer->FromName ="Easy Pet" ;
	
		//Assunto da mensagem
		$Mailer->Subject = 'EasyPet - Nova Senha';
	
		//Corpo da Mensagem
		$Mailer->Body ='Notificamos que o sr(a) '.$nome.' solicitou uma nova senha aconselhamos que altere sua nova senha por seguran&ccedil;a. <br><br>
		Sua nova senha &eacute;:'. $novasenha;
	
		//Corpo da mensagem em texto
		$Mailer->AltBody = 'sua nova senha' ;
	
		//Destinatario 
		$Mailer->AddAddress($email);
	
		if($Mailer->Send()){
			//echo "E-mail enviado com sucesso";
			$_SESSION['msg'] = "<div class='bg-success rounded py-2 mb-3' id='msgErro'><h5 class='text-white'>Consulte seu e-mail para acesso a sua nova senha caso não receba certifique se seu email foi digitado corretamente</h5></div>";
			//header("location:B-Faleconosco.php");
			//echo ("<script> {alert(\"Mensagem  enviada com sucesso podendo entrar em contato.\");} </script>");
		}else{
			$_SESSION['msg'] = "<div class='bg-danger rounded py-2 mb-3' id='msgErro'><h5 class='text-white'>Erro no envio do e-mail: " . $Mailer->ErrorInfo ."</h5></div>";
			header("Location: recuperarSenha.php");
		}
			$sql_code ="UPDATE funcionario set senha = '$novasenha' where  email ='$email'";
			$execute = mysqli_query($conn, $sql_code);
			//$sql_query =$mysqli->query($sql_code) or die($mysqli->error);
	}