<?php
require("header.php");
require("function.php");

// Exibir dados nos campos
if (isset($_GET['id'])) {
	$sql = "SELECT * FROM ordemServico WHERE id= " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$ordemServico = mysqli_fetch_assoc($result);
	
	$sql2 = "SELECT nome_animal, id_cliente FROM animal WHERE id= " . $ordemServico['idAnimal'];
	$result2 = mysqli_query($conn, $sql2);
	$animal = mysqli_fetch_assoc($result2);
	
	$sql3 = "SELECT cpf FROM cliente WHERE id= " . $animal['id_cliente'];
	$result3 = mysqli_query($conn, $sql3);
	$cliente = mysqli_fetch_assoc($result3);
	
	
	mysqli_close($conn);
}
?>

      <div class="container-fluid">
		
		<form method="POST" action="atualizaOS.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Editar Ordem de Serviço</h2></div>
			
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
				<input type="text" name="inputData" id="inputData" class="form-control" id="start" onkeypress="DataHora(event, this)" value="<?php echo $ordemServico['data']; ?>">
			</div>
			
		  </div>
		  
		 <div class="form-row">
	  			<div class="form-group col-md-8">
			   <label for="inputObservacoes">Observações</label>	
			   <textarea class="form-control" name="inputObservacoes" id="inputObservacoes" rows="10"><?php echo $ordemServico['observacoes']; ?></textarea>
			</div>
		</div>
		  
		  <div class="form-row">
                    <div class="form-group col-md-4">
						<label for="palavra">CPF do Cliente</label>
                        <input type="text" class="form-control" id="palavra" placeholder="CPF do cliente" value="<?php echo $cliente['cpf'];?>">
                        <button class="btn btn-default btn-primary mt-1 float-right" id="buscar" type="button">Buscar animal(is)</button>
					</div>
                    <div class="form-group col-md-4" id="dados">
						<label for="tempAnimal">Animal</label>
						<input type="text" class="form-control" id="tempAnimal" value="<?php echo $animal['nome_animal'];?>" readonly>
                    </div>
		</div>

		  <input type="submit" class="mt-3 btn btn-dark" value="Atualizar" name="atualizar">
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
