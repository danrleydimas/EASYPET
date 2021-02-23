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

    <title>EasyPet - Login</title>
	

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form method="post" action="validarLogin.php" class="form-signin">
	  <?php
		if (isset($_SESSION['msg'])) {
			echo '<div class="bg-danger rounded py-2 mb-3" id="msgErro"><h5 class="text-white">' . $_SESSION['msg'] . "</h5></div>";
			echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
			unset($_SESSION['msg']);
		}
	  ?>
      <img class="mb-4 aButton rotate loading" src="img/dog.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="usuario" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <input class="btn btn-lg btn-dark btn-block" name="btnLogin" type="submit" value="Entrar">
	  <div class="mt-3">
		<a href="recuperarSenha.php" class="linkEsqueciSenha">Esqueci a senha</a>
      </div>
	  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>
