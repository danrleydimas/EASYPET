<?php
	include_once("conexao.php");
	session_start();
	// Deletar animal
	if (isset($_GET['id'])) {
			$ID = mysqli_real_escape_string($conn, $_GET['id']);
			$query = "DELETE FROM animal WHERE ID = {$ID}";
			if (mysqli_query($conn, $query)) {
				$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Animal excluído com sucesso</h5></div>';
				mysqli_close($conn);
				header("Location: clientes.php");
			} else {
				$_SESSION['msg'] = '<div class="bg-success rounded text-center py-2 mb-3" id="msgErro"><h5 class="text-white">Não foi possível excluir o animal!</h5></div>';
				header("Location: clientes.php");

			}
	}