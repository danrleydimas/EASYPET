<?php
require("header.php");
require("function.php");

// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT * FROM cliente WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$cliente = mysqli_fetch_assoc($result);
	mysqli_close($conn);
}
?>

      <div class="container-fluid">
		
		<form method="POST" action="atualizaCliente.php" class="mx-4">
		<div class="my-2 my-5"><h2>Editar Cliente</h2></div>
		
		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>
		
		<!-- Informações gerais -->
		<div class="my-2 my-5"><h4>Informações Gerais</h4></div>			
		  <div class="form-row">
			<div class="form-group col-md-4">
			<label for="inputNome">Nome</label>
			  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required value="<?php echo $cliente['nome']; ?>">
			</div>
			<div class="form-group col-md-4">
			<label for="inputTelefone">Telefone</label>
			  <input type="number" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="Telefone" required value="<?php echo $cliente['telefone']; ?>">
			</div>			
			<div class="form-group col-md-4">
			<label for="inputEmail">Email</label>
			  <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required value="<?php echo $cliente['email']; ?>">
			</div>						
		  </div>
		  
		  <div class="form-row">
		  	<div class="form-group col-md-4">
			  <label for="inputRG">RG</label>				
			  <input type="text" class="form-control" name="inputRG" id="inputRG" placeholder="RG" required value="<?php echo $cliente['rg']; ?>">
			</div>
			<div class="form-group col-md-4">
			  <label for="inputCPF">CPF</label>				
			  <input type="text" class="form-control" name="inputCPF" id="inputCPF" placeholder="CPF" required value="<?php echo $cliente['cpf']; ?>">
			</div>
		  </div>
		  
		  
		  <!-- Contato -->
		  <div class="my-2 my-5"><h4>Contato</h4></div>
		  <div class="form-row">
		  <div class="form-group col-md-4">
			<label for="inputCEP">CEP</label>
			  <input type="text" class="form-control" name="inputCEP" id="inputCEP" placeholder="CEP" required value="<?php echo $cliente['cep']; ?>">
			</div>
			<div class="form-group col-md-4">
			<label for="inputEndereco">Endereço</label>
			  <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Endereço" required value="<?php echo $cliente['endereco']; ?>">
			</div>
			<div class="form-group col-md-1">
			<label for="inputNumero">Número</label>
			  <input type="text" class="form-control" name="inputNumero" id="inputNumero" placeholder="Numero" required value="<?php echo $cliente['numero']; ?>">
			</div>
			<div class="form-group col-md-3">
			<label for="inputComplemento">Complemento</label>
			  <input type="text" class="form-control" name="inputComplemento" id="inputComplemento" placeholder="Complemento" value="<?php echo $cliente['complemento']; ?>">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-4">
			<label for="inputBairro">Bairro</label>
			  <input type="text" class="form-control" name="inputBairro" id="inputBairro" placeholder="Bairro" required value="<?php echo $cliente['bairro']; ?>">
			</div>
			<div class="form-group col-md-4">
			<label for="inputCidade">Cidade</label>
			  <input type="text" class="form-control" name="inputCidade" id="inputCidade" placeholder="Cidade" required value="<?php echo $cliente['cidade']; ?>">
			</div>
			<div class="form-group col-md-4">
			<label for="inputEstado">Estado</label>
				<select class="form-control" name="inputEstado" id="inputEstado">
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP" selected="selected">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
			</div>
		  </div>
		  
		<input type="hidden" value="<?php echo $cliente['id']; ?>" name="inputID">
		  <input type="submit" class="mt-3 btn btn-dark" value="Atualizar" name="Atualizar">
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
