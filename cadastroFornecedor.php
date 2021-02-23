<?php
require("header.php");
require("function.php");
?>

      <div class="container-fluid">
		
		<form method="POST" action="processafornecedor.php" class="mx-4">
		<div class="my-2 my-5"><h2>Cadastro de fornecedor</h2></div>
		
		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>
		
		  <div class="my-2 my-5"><h4>Informações Gerais</h4></div>			
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputNomeFantasia">Nome Fantasia</label>
			  <input type="text" class="form-control" name="inputNomeFantasia" id="inputNomeFantasia" placeholder="Nome Fantasia" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputRazaoSocial">Razão Social</label>
			  <input type="text" class="form-control" name="inputRazaoSocial" id="inputRazaoSocial" placeholder="Razão Social" required>
			</div>			
			<div class="form-group col-md-4">
			  <label for="inputCNPJ">CNPJ</label>
			  <input type="CNPJ" class="form-control" name="inputCNPJ" id="inputCNPJ" placeholder="CNPJ" required>
			</div>						
		  </div>
		  
		 <!-- Informações bancárias -->	
		<div class="my-2 my-5"><h4>Informações Bancárias</h4></div>		  
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputBanco">Banco</label>
			  <input type="text" class="form-control" name="inputBanco" id="inputBanco" placeholder="Banco" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputAgencia">Agência</label>
			  <input type="number" class="form-control" name="inputAgencia" id="inputAgencia" placeholder="Agencia" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputConta">Conta</label>
			  <input type="number" class="form-control" name="inputConta" id="inputConta" placeholder="Conta" required>
			</div>
		  </div>
		  
		<!-- Contato -->	
		<div class="my-2 my-5"><h4>Contato</h4></div>		
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputCEP">CEP</label>
			  <input type="text" class="form-control" name="inputCEP" id="inputCEP" placeholder="CEP" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="inputEndereco">Endereço</label>
			  <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Endereço" required>
			</div>
		    <div class="form-group col-md-4">
			  <label for="inputEmail">Email</label>
			  <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputTelefone">Telefone</label>
			  <input type="number" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="Telefone" required>
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
