<?php
require("header.php");
require("function.php");

// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT * FROM funcionario WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$funcionario = mysqli_fetch_assoc($result);
	mysqli_close($conn);
}
?>

      <div class="container-fluid">
		
		<form method="POST" action="atualizaFuncionario.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Editar Funcionário</h2></div>
		
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
		<div class="my-2 my-5"><h4>Editar Dados</h4></div>			
		  <div class="form-row">
			<div class="form-group col-md-5">
			  <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" value="<?php echo $funcionario['nome']; ?>" required>
			</div>
			<div class="form-group col-md-3">
			  <select id="inputCargo" name="inputCargo" class="form-control" required>
				<option selected>Gerente</option>
				<option>Atendente</option>
			  </select>
			</div>
			<div class="form-group col-md-4">
			  <input type="number" class="form-control" name="inputSalario" id="inputSalario" placeholder="Salario" value="<?php echo $funcionario['salario']; ?>"required>
			</div>			
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCarteira" id="inputCarteira" value="<?php echo $funcionario['ctps']; ?>" placeholder="Nº da Carteira de Trabalho">
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputRG" id="inputRG" value="<?php echo $funcionario['rg']; ?>" placeholder="RG" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCPF" id="inputCPF" value="<?php echo $funcionario['cpf']; ?>" placeholder="CPF" required>
			</div>
		  </div> 
		  		  <div class="form-row">
			<div class="form-group col-md-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text">Foto</span>
		  </div>
		  <div class="custom-file">
			<input type="file" class="custom-file-input" name="inputFoto" id="inputFoto" value="<?php echo $funcionario['foto']; ?>">
			<label class="custom-file-label" for="inputFoto">Escolher arquivo</label>
		  </div>
		</div>
		</div>
		</div>
		 
		<!-- Informações bancárias -->	
		<div class="my-2 my-5"><h4>Informações Bancárias</h4></div>		  
		  <div class="form-row">
			<div class="form-group col-md-3">
			  <input type="text" class="form-control" name="inputBanco" id="inputBanco" value="<?php echo $funcionario['banco']; ?>" placeholder="Banco" required>
			</div>
			<div class="form-group col-md-3">
			  <input type="text" class="form-control" name="inputAgencia" id="inputAgencia" value="<?php echo $funcionario['agencia']; ?>" placeholder="Agencia" required>
			</div>
			<div class="form-group col-md-3">
			  <input type="text" class="form-control" name="inputConta" id="inputConta" value="<?php echo $funcionario['conta']; ?>" placeholder="Conta" required>
			</div>
		  </div>
		  
		  <!-- Contato -->
		  <div class="my-2 my-5"><h4>Contato</h4></div>
		  <div class="form-row">
		  <div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCEP" id="inputCEP" placeholder="CEP" value="<?php echo $funcionario['cep']; ?>" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" value="<?php echo $funcionario['endereco']; ?>" placeholder="Endereço" required>
			</div>
			<div class="form-group col-md-1">
			  <input type="text" class="form-control" name="inputNumero" id="inputNumero" placeholder="Numero" value="<?php echo $funcionario['numero']; ?>" required>
			</div>
			<div class="form-group col-md-3">
			  <input type="text" class="form-control" name="inputComplemento" id="inputComplemento" placeholder="Complemento" value="<?php echo $funcionario['complemento']; ?>">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputBairro" id="inputBairro" placeholder="Bairro" value="<?php echo $funcionario['bairro']; ?>" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="text" class="form-control" name="inputCidade" id="inputCidade" placeholder="Cidade" value="<?php echo $funcionario['cidade']; ?>" required>
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
					<option value="SP" selected>São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <input type="number" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="Telefone" value="<?php echo $funcionario['telefone']; ?>" required>
			</div>
			<div class="form-group col-md-4">
			  <input type="email" class="form-control" name="inputEmail" id="inputEmail"  placeholder="Email" value="<?php echo $funcionario['email']; ?>" required>
			</div>
		</div>		
			<input type="hidden" value="<?php echo $funcionario['id']; ?>" name="inputID">
		  <input type="submit" class="mt-3 btn btn-dark" value="Atualizar" name="atualizar">
		</form>
      </div>
	  
	  
	  	<script type="text/javascript">
		$("#inputCEP").focusout(function(){
			$.ajax({
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				dataType: 'json',
				success: function(resposta){
					$("#inputEndereco").val(resposta.logradouro);
					$("#inputComplemento").val(resposta.complemento);
					$("#inputBairro").val(resposta.bairro);
					$("#inputCidade").val(resposta.localidade);
					$("#inputEstado").val(resposta.uf);
					$("#inputNumero").focus();
				}
			});
		});
		</script>
	  
	  
	  
	  
		  
<?php
include_once("footer.php");
?>
