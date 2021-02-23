<?php
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/dog.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/rotate.css">

    <title>EasyPet - Alterar Senha</title>
	
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body class="text-center">
    <form method="post" action="EnviarNovaSenha.php" class="form-signin">
	  <?php
		if (isset($_SESSION['msg'])) {
			echo  $_SESSION['msg'];
			echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
			unset($_SESSION['msg']);
		}
	  ?>
      <img class="mb-4 aButton rotate loading" src="img/dog.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Alterar Senha</h1>
	  
      <input type="password" id="inputSenha" name="email" class="mb-3 form-control" required placeholder="Senha Atual">

      <input type="password" id="inputEmail" name="email" class="mb-3 form-control" required placeholder="Nova Senha">

      <input type="password" id="inputEmail" name="email" class="mb-3 form-control" required placeholder="Reconfirmação de senha">
      
	  <input class="btn btn-lg btn-dark btn-block" name="btnLogin" type="submit" value="Alterar Senha">
	  
	  <p class="mt-5 mb-3 text-muted">EasyPet<br>&copy; 2020</p>
    </form>
  </body>
</html>
