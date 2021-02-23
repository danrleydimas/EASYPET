<?php
require("header.php");
require("function.php");


if (isset($_POST['inputCliente'])) {
	$cpf = $_POST['inputCliente'];
	$sql2 = "SELECT animal.id, animal.nome FROM animal INNER JOIN cliente ON (animal.id = cliente.id) WHERE cliente.id = " . $id;
	$result2 = mysqli_query($conn, $sql2);	
}

?>

      <div class="container-fluid">

		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>	  
		
		<form method="POST" action="processaOS.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Cadastro de Ordem de Serviço</h2></div>
			
		  <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputTipo">Tipo</label>
				<select class="form-control" name="inputTipo" id="inputTipo">
					<option value="Banho">Banho</option>
					<option value="Banho e Tosa">Banho e tosa</option>
					<option value="Consulta veterinário">Consulta veterinário</option>
					<option value="Hotel">Hotel</option>
					<option value="Dog walking">Dog walking</option>
				</select>
			</div>	
			
			<div class="form-group col-md-4">
				<label for="inputData">Data e horário</label>
				<input type="text" name="inputData" id="inputData" class="form-control" id="start" onkeypress="DataHora(event, this)">
			</div>
			
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-2">
					<label for="inputPreco">Preço</label>
				<input type="number" name="inputPreco" id="inputPreco" class="form-control" id="inputPreco">		
			</div>		
		  </div>
		  
		 <div class="form-row">
	  			<div class="form-group col-md-8">
			   <label for="inputObservacoes">Observações</label>	
			   <textarea class="form-control" name="inputObservacoes" id="inputObservacoes" rows="10"></textarea>
			</div>
		</div>
		  
		  <div class="form-row">
                    <div class="form-group col-md-4">
						<label for="palavra">CPF do Cliente</label>
                        <input type="text" class="form-control" id="palavra" placeholder="CPF do cliente">
                        <button class="btn btn-default btn-primary mt-1 float-right" id="buscar" type="button">Buscar animal(is)</button>
					</div>
                    <div class="form-group col-md-4" id="dados">
                    </div>
		</div>

		  <input type="submit" class="mt-3 btn btn-dark" value="Cadastrar" name="cadastrar">
		</form>
</div>
	  
	  
	  	<script>
		
		 function buscar(palavra)
            {
                var page = "busca.php";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#dados").html("Carregando...");
                            },
                            data: {palavra: palavra},
                            success: function (msg)
                            {
                                $("#dados").html(msg);
                            }
                        });
            }
            
            
            $('#buscar').click(function () {
                buscar($("#palavra").val())
            });
		
		
		
		
		
		//Mascara para o campo data e hora
	function DataHora(evento, objeto) {
		var keypress = (window.event) ? event.keyCode : evento.which;
		campo = eval(objeto);
		if (campo.value == '00/00/0000 00:00') {
			campo.value = "";
		}

		caracteres = '0123456789';
		separacao1 = '/';
		separacao2 = ' ';
		separacao3 = ':';
		conjunto1 = 2;
		conjunto2 = 5;
		conjunto3 = 10;
		conjunto4 = 13;
		conjunto5 = 16;
		if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
			if (campo.value.length == conjunto1)
				campo.value = campo.value + separacao1;
			else if (campo.value.length == conjunto2)
				campo.value = campo.value + separacao1;
			else if (campo.value.length == conjunto3)
				campo.value = campo.value + separacao2;
			else if (campo.value.length == conjunto4)
				campo.value = campo.value + separacao3;
			else if (campo.value.length == conjunto5)
				campo.value = campo.value + separacao3;
		} else {
			event.returnValue = false;
		}
	}
	</script>
	    
		  
<?php
include_once("footer.php");
?>
