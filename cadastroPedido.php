<?php
require("header.php");
require("function.php");
?>

      <div class="container-fluid">
		
		<form method="POST" action="processaPedido.php" class="mx-4" enctype="multipart/form-data">
		<div class="my-2 my-5"><h2>Cadastro de Pedido</h2></div>
		
		<!-- div com a mensagem para o usuário -->
		<div><?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<script type='text/javascript'>setTimeout(function(){document.querySelector('#msgErro').remove();}, 2000);</script>";
				unset($_SESSION['msg']);
			}
		?>
		</div>
			
			<div class="my-2 my-5"><h4>Informação do cliente</h4></div>
			<div class="form-row">
				<div class="form-group col-md-4">
                        <input type="text" class="form-control" id="palavra2" placeholder="CPF do cliente" name="inputCPF">
				
				</div>
				
				<div class="form-group col-md-2">			
					<input type="button" class="btn btn-primary form-control" id="buscar2" onclick="abrirOS()" value="Ordens de serviço">
				</div>

				<div class="form-group col-md-2">			
					<input type="button" class="btn btn-primary form-control" onclick="abrirProdutos()" value="Produtos">
				</div>
			
			</div>
			
				
		<span id="ordensdeservico">
		<div class="form-row">
			<div class="form-group col-md-4"><h4>Ordens de serviço</h4></div>	
		</div>
				
		<div class="form-row">
                    <div class="form-group col-md-8" id="carrinhoOS">

				</div>
		</div>
		
		</span>
		
			
			<span id="produtos">
	      <div class="my-2 my-5"><h4>Produtos</h4></div>	
		  <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="palavra" placeholder="Produto">
					</div>
					<div class="form-group col-md-2">
                        <button class="btn btn-default btn-primary form-control" id="buscar" type="button">Buscar produto(s)</button>
					</div>			
			</div>
			<div class="form-row">
                    <div class="form-group col-md-8" id="dados">
                    </div>
		</div>
		<div class="my-2 my-5"><h4>Produtos adicionados</h4></div>		
				
				
		<div class="form-row">
                    <div class="form-group col-md-8">
					<table class="table table-hover table-dark" id="table-id">
							<thead>
							<tr>
								<th scope="col">Nome do produto</th>
								<th scope="col">Preço</th>
								<th scope="col">Ação</th>
							</tr>
						</thead>				
						<tbody id="carrinho"></tbody>
					</table>
				</div>
		</div>
		</span>
		
		<div class="form-row">
			<div class="form-group col-md-4">
					<table class="table table-hover table-dark" id="table-id">
							<thead>
							<tr>
								<th scope="col">OS (R$)</th>
								<th scope="col">Produtos (R$)</th>
								<th scope="col">Total(R$)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td id="totalOS"></td>
								<td id="totalProduto"></td>
								<td id="total"></td>
							</tr>
						</tbody>
					</table>
			</div>
			<input type="hidden" name="inputTotalOS" id="inputTotalOS">
			<input type="hidden" name="inputTotalProduto" id="inputTotalProduto">
			<input type="hidden" name="inputTotal" id="inputTotal">
		</div>
	
		
		
		
		  <input type="hidden" name="inputAtendente" id="inputAtendente" value="<?php echo $_SESSION['nome']; ?>">
		  <input type="submit" class="mt-3 mb-3 btn btn-dark" value="Confirmar Pedido" name="cadastrar">
		  
		  
		  
		</form>
      </div>
	  
	  
	  	<script type="text/javascript">
		
			document.getElementById('ordensdeservico').style.display = "none";
			document.getElementById('produtos').style.display = "none";
		
			function abrirOS() {
			  var x = document.getElementById("ordensdeservico");
			  var y = document.getElementById("produtos");
			  if (x.style.display === "none") {
				x.style.display = "block";
				y.style.display = "none";
			  } else {
				x.style.display = "none";
			  }
			  
			  
			}
		
		
			function abrirProdutos() {
			  var x = document.getElementById("produtos");
			  var y = document.getElementById("ordensdeservico");
			  if (x.style.display === "none") {
				x.style.display = "block";
				y.style.display = "none";
			  } else {
				x.style.display = "none";
			  }
			}
		

			function excluir(classe) {
				// valor para subtrair
				var valor = document.getElementsByClassName(classe)[0].parentElement.parentElement.childNodes[1].innerText;
				document.getElementById("totalProduto").innerHTML = parseInt(document.getElementById("totalProduto").innerHTML) - parseInt(valor);
				document.getElementById("inputTotalProduto").value = parseInt(document.getElementById("totalProduto").innerHTML);
				document.getElementsByClassName(classe)[0].parentElement.parentElement.remove();
				
				// Total
				document.getElementById("total").innerHTML = parseInt(document.getElementById("total").innerHTML) - parseInt(valor);
				document.getElementById("inputTotal").value = document.getElementById("total").innerHTML;
			}
			
			function myFunction(indice) {
			  var produto = document.createElement("tr");
			  var today = new Date();
			  var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
			  
			  
			  nome = document.getElementsByClassName("nomeProduto")[indice].innerHTML;
			  preco = document.getElementsByClassName("precoProduto")[indice].innerHTML;
			  produto.innerHTML = "<td>" + nome + "</td><td class='valor'>" + preco + "</td><td><a class='btn text-light bg-danger " + time + "' onclick=excluir(" + time + ")>Excluir</a></td>";
			  document.getElementById("carrinho").appendChild(produto);
			  
			  if (document.getElementById("totalProduto").innerHTML == '') {
				 document.getElementById("totalProduto").innerHTML = 0;
			  }
				document.getElementById("totalProduto").innerHTML = parseInt(document.getElementById("totalProduto").innerHTML) + parseInt(document.getElementsByClassName("precoProduto")[indice].textContent);
				document.getElementById("inputTotalProduto").value = parseInt(document.getElementById("totalProduto").innerHTML);
				
				
			if (document.getElementById("total").innerHTML == '') {
				 document.getElementById("total").innerHTML = 0;
			  }
				// Total
				document.getElementById("total").innerHTML = parseInt(document.getElementById("total").innerHTML) + parseInt(document.getElementsByClassName("precoProduto")[indice].textContent);
				document.getElementById("inputTotal").value = document.getElementById("total").innerHTML;
			}
		
			
			function buscar(palavra) {
                var page = "buscaProduto.php";
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
			

			function buscar2(palavra2) {
                var page = "buscaOS.php";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#carrinhoOS").html("Carregando...");
                            },
                            data: {palavra2: palavra2},
                            success: function (msg)
                            {
                                $("#carrinhoOS").html(msg);
                            }
                        });
            }
            
            var x = 0;
			if (x == 0) {
					$('#buscar2').click(function () {
						buscar2($("#palavra2").val())
					});
				x = 1;
			}

	</script>
	    
		  
<?php
include_once("footer.php");
?>
