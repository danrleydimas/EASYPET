<?php
	session_start();
	include_once("conexao.php");
	if (empty($_SESSION['id'])) {
		$_SESSION['msg'] = "Área restrita";
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EasyPet</title>
  <link rel="icon" href="img/dog.png">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
   <!-- Bootstrap core JavaScript -->
   <!-- JS, Popper.js, and jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="css/home.css" rel="stylesheet">
  <link rel="stylesheet" href="css/rotate.css">
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo $_SESSION['nome'] .  " <b>(" .  $_SESSION['cargo'] . ")</b>"; ?></div>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-light">Home</a>
		<?php if($_SESSION['cargo'] == 'Gerente') {
				echo '<a href="fornecedores.php" class="list-group-item list-group-item-action bg-light">Fornecedores</a>';
				echo '<a href="produtos.php" class="list-group-item list-group-item-action bg-light">Produtos</a>';
				echo '<a href="funcionarios.php" class="list-group-item list-group-item-action bg-light">Funcionários</a>';
				echo '<a href="#" class="list-group-item list-group-item-action bg-light">Configurações</a>';				
			} else {
				echo '<a href="clientes.php" class="list-group-item list-group-item-action bg-light">Cliente</a>';
				echo '<a href="ordemservico.php" class="list-group-item list-group-item-action bg-light">Ordem de Serviço</a>';		
				echo '<a href="pedidos.php" class="list-group-item list-group-item-action bg-light">Pedido</a>';
				echo '<a href="#" class="list-group-item list-group-item-action bg-light">Configurações</a>';

				
			}
		?>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">     
	   <button class="btn btn-dark" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<h3 class="ml-5">EasyPet</h3>
		<img class="ml-3 mb-1 aButton rotate loading" src="img/dog.png" alt="" width="40" height="40">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Página Inicial<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="meuPerfil.php">Meu Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="sair.php">Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  