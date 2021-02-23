<?php
require("header.php");
require("function.php");

// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT * FROM produto WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$produto = mysqli_fetch_assoc($result);
}


// Consultando as informações do fornecedor
$sql2 = "SELECT * FROM fornecedor";
$result2 = mysqli_query($conn, $sql2);

?>

      <div class="container-fluid">
		
		<form method="POST" action="atualizaProduto.php" class="mx-4">
			<div class="my-2 my-5"><h2>Editar Produto</h2></div>
			  <div class="form-row">
				<div class="form-group col-md-4">
				  <label for="inputNome">Nome</label>
				  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required value="<?php echo $produto['nome']; ?>">
				</div>
				<div class="form-group col-md-4">
				  <label for="inputFornecedor">Fornecedor</label>	
				  <select class="form-control" name="inputFornecedor" id="inputFornecedor">
						<?php
							echo "<option value='" . $produto['fornecedor_produto'] . "' selected>" . $produto['fornecedor'] . "</option>";
							while($row = $result2->fetch_assoc()) {
								if ($produto['fornecedor_produto'] == $row['id']) {
									continue;
								} else {
									echo "<option value='" . $row['id'] . "'>" . $row['nomeFantasia'] . "</option>";
								}
							}
						?>
				</select>				  
					
				</div>			
			<div class="form-group col-md-4">
			  <label for="inputEspecie">Espécie</label>
				<select class="form-control" name="inputEspecie" id="inputEspecie">
					<?php if($produto['especie'] == 'Cachorro') { 
								echo '<option value="Cachorro" selected>Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';
							} else if($produto['especie'] == 'Gato') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato" selected>Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';	
							} else if ($produto['especie'] == 'Peixe') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe" selected>Peixe</option>';
								echo '<option value="Aves">Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';	
							} else if ($produto['especie'] == 'Aves') {
								echo '<option value="Cachorro">Cachorro</option>';
								echo '<option value="Gato">Gato</option>';
								echo '<option value="Peixe">Peixe</option>';
								echo '<option value="Aves" selected>Aves</option>';
								echo '<option value="Coelho">Coelho</option>';
								echo '<option value="Roedor">Roedor</option>';
							}  else if ($produto['especie'] == 'Coelho') {
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
			  </div>
			  
			  <div class="form-row">
				<div class="form-group col-md-4">
				  <label for="inputPreco">Preço</label>	
				  <input type="number" class="form-control" name="inputPreco" id="inputPreco" placeholder="Preço" required value="<?php echo $produto['preco']; ?>">
				</div>			
			<div class="form-group col-md-4">
			  <div class="input-group-prepend">
				  <label for="inputFoto">Foto</label>
			  </div>
			  <div class="custom-file">
				<input type="file" class="custom-file-input" name="inputFoto" id="inputFoto" value="<?php echo $produto['foto']; ?>">
				<label class="custom-file-label" for="inputFoto">Escolher arquivo</label>
			  </div>						
			  </div>
			<div class="form-group col-md-4">
			  <label for="inputCategoria">Categoria</label>
				<select class="form-control" name="inputCategoria" id="inputCategoria">
					<?php if($produto['categoria'] == 'Alimentação') { 
								echo '<option value="Alimentação" selected>Alimentação</option>';
								echo '<option value="Medicamento">Medicamento</option>';
								echo '<option value="Brinquedo">Brinquedo</option>';
								echo '<option value="Acessório">Acessório</option>';
								echo '<option value="Roupa">Roupa</option>';
								echo '<option value="Outros">Outros</option>';
							} else if($produto['categoria'] == 'Medicamento') {
								echo '<option value="Alimentação">Alimentação</option>';
								echo '<option value="Medicamento" selected>Medicamento</option>';
								echo '<option value="Brinquedo">Brinquedo</option>';
								echo '<option value="Acessório">Acessório</option>';
								echo '<option value="Roupa">Roupa</option>';
								echo '<option value="Outros">Outros</option>';
							} else if($produto['categoria'] == 'Brinquedo') {
								echo '<option value="Alimentação">Alimentação</option>';
								echo '<option value="Medicamento" >Medicamento</option>';
								echo '<option value="Brinquedo" selected>Brinquedo</option>';
								echo '<option value="Acessório">Acessório</option>';
								echo '<option value="Roupa">Roupa</option>';
								echo '<option value="Outros">Outros</option>';
							} else if($produto['categoria'] == 'Acessório') {
								echo '<option value="Alimentação">Alimentação</option>';
								echo '<option value="Medicamento" >Medicamento</option>';
								echo '<option value="Brinquedo">Brinquedo</option>';
								echo '<option value="Acessório" selected>Acessório</option>';
								echo '<option value="Roupa">Roupa</option>';
								echo '<option value="Outros">Outros</option>';
							}  else if($produto['categoria'] == 'Roupa') {
								echo '<option value="Alimentação">Alimentação</option>';
								echo '<option value="Medicamento" >Medicamento</option>';
								echo '<option value="Brinquedo">Brinquedo</option>';
								echo '<option value="Acessório">Acessório</option>';
								echo '<option value="Roupa" selected>Roupa</option>';
								echo '<option value="Outros">Outros</option>';
							} else {
								echo '<option value="Alimentação">Alimentação</option>';
								echo '<option value="Medicamento" >Medicamento</option>';
								echo '<option value="Brinquedo">Brinquedo</option>';
								echo '<option value="Acessório">Acessório</option>';
								echo '<option value="Roupa">Roupa</option>';
								echo '<option value="Outros" selected>Outros</option>';
							}
					?>
				</select>	
			</div>
		  </div>
		  	  <div class="form-row">
	  			<div class="form-group col-md-8">
			   <label for="inputDescricao">Descrição</label>	
			   <textarea class="form-control" name="inputDescricao" id="inputDescricao" rows="10"><?php echo $produto['descricao']; ?></textarea>
			</div>
		</div>
		  
		  
			  <input type="hidden" value="<?php echo $produto['id']; ?>" name="inputID">
			  <input type="submit" class="mt-3 btn btn-dark" value="Atualizar" name="atualizar">
		</form>
      </div>
	  
	  
	  
		  
<?php
include_once("footer.php");
?>
