<?php
require("header.php");
require("function.php");

// Consultando as informações dos fornecedores
$sql = "SELECT * FROM fornecedor";
$result = mysqli_query($conn, $sql);
?>

      <div class="container-fluid">
		
		<form method="POST" action="processaProduto.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Cadastro de Produto</h2></div>
		
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
			  <label for="inputFornecedor">Fornecedor</label>			
				<select class="form-control" name="inputFornecedor" id="inputFornecedor">
					<?php while($row = $result->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['nomeFantasia'] . "</option>";
						}
						mysqli_close($conn);
					?>
				</select>
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
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-4">
	          <label for="inputPreco">Preço</label>	
			  <input type="number" class="form-control" name="inputPreco" id="inputPreco" placeholder="Preço" required>
			</div>			
		<div class="form-group col-md-4">
		  <div class="input-group-prepend">
	          <label for="inputFoto">Foto</label>
		  </div>
		  <div class="custom-file">
			<input type="file" class="custom-file-input" name="inputFoto" id="inputFoto">
			<label class="custom-file-label" for="inputFoto">Escolher arquivo</label>
		  </div>						
		  </div>
			<div class="form-group col-md-4">
			  <label for="inputCategoria">Categoria</label>
				<select class="form-control" name="inputCategoria" id="inputCategoria">
					<option value="Alimentação">Alimentação</option>
					<option value="Medicamento">Medicamento</option>
					<option value="Brinquedo">Brinquedo</option>
					<option value="Acessório">Acessório</option>
					<option value="Roupa">Roupa</option>
					<option value="Outros">Outros</option>
				</select>
			</div>			  
      </div>
	  <div class="form-row">
	  			<div class="form-group col-md-8">
			   <label for="inputDescricao">Descrição</label>	
			   <textarea class="form-control" name="inputDescricao" id="inputDescricao" rows="10"></textarea>
			</div>
		</div>
	  
		  <input type="submit" class="mt-3 btn btn-dark" value="Cadastrar" name="cadastrar">
		</form>
</div>
	  
	  
	  	<script type="text/javascript">
		$("#inputCEP").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#inputEndereco").val(resposta.logradouro);
					$("#inputComplemento").val(resposta.complemento);
					$("#inputBairro").val(resposta.bairro);
					$("#inputCidade").val(resposta.localidade);
					$("#inputEstado").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#inputNumero").focus();
				}
			});
		});
	</script>
	  
	  
	  
	  
	  
	  
		  
<?php
include_once("footer.php");
?>
