<?php
require("header.php");
require("function.php");

// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT * FROM animal WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$animal = mysqli_fetch_assoc($result);
	mysqli_close($conn);
}
?>

      <div class="container-fluid">
		
		<form method="POST" action="atualizaAnimal.php" class="mx-4">
		<div class="my-2 my-5"><h2 class="text-white">Atualização de dados de Animal</h2></div>
		
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputNome">Nome</label>
			  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required value="<?php echo $animal['nome_animal']; ?>">
			</div>
			<div class="form-group col-md-4">
			  <label for="inputEspecie">Espécie</label>
				<select class="form-control" name="inputEspecie" id="inputEspecie">
					<?php if($animal['especie'] == 'Cachorro') { 
								echo '<option value="Cachorro" selected>Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';
							} else if($animal['especie'] == 'Gato') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato" selected>Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';	
							} else if ($animal['especie'] == 'Peixe') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe" selected>Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';	
							} else if ($animal['especie'] == 'Aves') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves" selected>Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';
							}  else if ($animal['especie'] == 'Coelho') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho" selected>Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';
							} else {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor" selected>Roedor</option>';
							}
					?>
					
				</select>
			</div>		
			<div class="form-group col-md-4">
			  <label for="inputRaça">Raça</label>
			  <input type="text" class="form-control" name="inputRaca" id="inputRaca" placeholder="Raça" required value="<?php echo $animal['raca']; ?>">
			</div>						
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputIdade">Idade</label>
			  <input type="number" class="form-control" name="inputIdade" id="inputIdade" placeholder="Idade" required value="<?php echo $animal['idade']; ?>">
			</div>
		<div class="form-group col-md-4">
	          <label for="inputPeso">Peso (kg)</label>
			  <input type="text" class="form-control" name="inputPeso" id="inputPeso" placeholder="Peso" required value="<?php echo $animal['peso']; ?>">
			</div>		
		<div class="form-group col-md-4">
				<div>
				<label for="inputSexo">Sexo</label>
				</div>
					<?php
						if($animal['sexo'] == 'Macho') { 
							echo '<label class="radio-inline mr-5"><input type="radio" name="inputSexo" value="Macho" checked>Macho</label>';
							echo '<label class="radio-inline"><input type="radio" name="inputSexo" value="Femea">Fêmea</label>';
						} else {
							echo '<label class="radio-inline mr-5"><input type="radio" name="inputSexo" value="Macho" >Macho</label>';
							echo '<label class="radio-inline"><input type="radio" name="inputSexo" value="Femea" checked>Fêmea</label>';							
						}
					?>

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
		  
		  
		  <input type="hidden" name="inputID" id="inputID" value="<?php echo $animal['ID']; ?>"">

		  <input type="submit" class="mt-3 btn btn-dark" value="Atualizar" name="atualizar">
		</form>
      </div>
	  
	  
	  
		  
<?php
include_once("footer.php");
?>
