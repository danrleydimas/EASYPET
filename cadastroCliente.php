<?php
require("header.php");
require("function.php");
?>

      <div class="container-fluid">
		
		<form method="POST" action="processaCliente.php" class="mx-4">
		<div class="my-2 my-5"><h2>Cadastro de Cliente</h2></div>
		
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
			  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="number" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="Telefone" required>
			</div>			
			<div class="form-group col-md-4">
			  <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
			</div>						
		  </div>
		  <div class="form-row">
		  	<div class="form-group col-md-4">
			  <label for="inputRG">RG</label>				
			  <input type="text" class="form-control" name="inputRG" id="inputRG" placeholder="RG" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputCPF">CPF</label>				
			  <input type="text" class="form-control" name="inputCPF" id="inputCPF" placeholder="CPF" required>
			</div>
		  </div>
		  
		  <!-- Contato -->
		  <div class="my-2 my-5"><h4>Contato</h4></div>
		  <div class="form-row">
		  <div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCEP" id="inputCEP" placeholder="CEP" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Endereço" required>
			</div>
			<div class="form-group col-md-1">
			  <input type="text" class="form-control" name="inputNumero" id="inputNumero" placeholder="Numero" required>
			</div>
			<div class="form-group col-md-3">
			  <input type="text" class="form-control" name="inputComplemento" id="inputComplemento" placeholder="Complemento">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputBairro" id="inputBairro" placeholder="Bairro" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCidade" id="inputCidade" placeholder="Cidade" required>
			</div>
			<div class="form-group col-md-4">
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
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
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
