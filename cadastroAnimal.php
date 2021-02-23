<?php
require("header.php");
require("function.php");
// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT nome FROM cliente WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$cliente = mysqli_fetch_assoc($result);
	mysqli_close($conn);
}
?>

      <div class="container-fluid">
		
		<form method="POST" action="processaAnimal.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Cadastro de Animal do(a) cliente <?php echo $cliente['nome'];?></h2></div>
		
		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>
		
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputNome">Nome</label>
			  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputEspecie">Espécie</label>
				<select class="form-control" name="inputEspecie" id="inputEspecie">
					<option value="Cachorro">Cachorro</option>
					<option value="Gato">Gato</option>
					<option value="Peixe">Peixe</option>
					<option value="Aves">Aves</option>
					<option value="Coelho">Coelho</option>
					<option value="Roedor">Roedor</option>
				</select>
			</div>		
			<div class="form-group col-md-4">
			  <label for="inputRaça">Raça</label>
			  <input type="text" class="form-control" name="inputRaca" id="inputRaca" placeholder="Raça" required>
			</div>						
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputIdade">Idade</label>
			  <input type="number" class="form-control" name="inputIdade" id="inputIdade" placeholder="Idade" required>
			</div>
		<div class="form-group col-md-4">
	          <label for="inputPeso">Peso (kg)</label>
			  <input type="text" class="form-control" name="inputPeso" id="inputPeso" placeholder="Peso" required>
			</div>		
		<div class="form-group col-md-4">
				<div>
				<label for="inputSexo">Sexo</label>
				</div>	
					<label class="radio-inline mr-5"><input type="radio" name="inputSexo" checked value="Macho">Macho</label>
					<label class="radio-inline"><input type="radio" name="inputSexo" value="Femea">Fêmea</label>
			</div>
		  </div>
		  
		<div class="form-row">
			<div class="form-group col-md-4">
			 <label for="inputProntuario">Prontuário</label>
			<div class="input-group mb-3">			
				<div class="input-group-prepend">
					<span class="input-group-text">Arquivo</span>
		  </div>
		  <div class="custom-file">
			<input type="file" class="custom-file-input" name="inputProntuario" id="inputProntuario">
			<label class="custom-file-label" for="inputProntuario">Adicionar prontuário</label>
		  </div>
		</div>
		</div>
		</div>
		  
		  
		  <input type="hidden" name="inputIDCliente" id="inputIDCliente" value="<?php echo $_GET['id'];?>">

		  <input type="submit" class="mt-3 btn btn-dark" value="Cadastrar" name="cadastrar">
		</form>
      </div>
	  
	 

		  
<?php
include_once("footer.php");
?>
