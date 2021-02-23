<?php
include_once("header.php");
?>

<?php if ($_SESSION['cargo'] == 'Gerente') {
			echo 	'
					<div class="grid">
						<h2 class="text-left text-white mt-3"><b>Bem-vindo(a) ' . $_SESSION['nome'] . '</b></h2>
					</div>
			
					<div class="grid">
          					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/employee.jpg" alt="img25"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Funcionários</span></h2>
							<p>
								<a href="funcionarios.php"><i class="fas fa-people-carry fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
          					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/supplier.jpg" alt="img25"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Fornecedores</span></h2>
							<p>
								<a href="fornecedores.php"><i class="fas fa-parachute-box fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
					</div>
					<div class="grid">					
					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/product.jpg" alt="product"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Produtos</span></h2>
							<p>
								<a href="produtos.php"><i class="fas fa-box-open fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/settings.jpg"   width="500px" height="400px"  />
						<figcaption>
							<h2><span>Configurações</span></h2>
							<p>
								<a href="#"><i class="fas fa-cogs fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>					
				</div>';
		} else {
			echo 	'
					<div class="grid">
						<h2 class="text-left text-white mt-3"><b>Bem-vindo(a) ' . $_SESSION['nome'] . '</b></h2>
					</div>
					<div class="grid">
          					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/client.jpg" alt="Clientes"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Clientes</span></h2>
							<p>
								<a href="clientes.php"><i class="fas fa-street-view fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
					
					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/service.jpg" alt="Ordem de Serviço"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Ordem de Serviço</span></h2>
							<p>
								<a href="ordemServico.php"><i class="fas fa-calendar-alt fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
					</div>
					<div class="grid">											
					<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/request.jpg" alt="Pedidos"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Pedidos</span></h2>
							<p>
								<a href="pedidos.php"><i class="fas fa-edit fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
										<figure class="effect-hera" style="border-radius: 5%">
						<img src="img/home/settings.jpg" alt="Configurações"  width="500px" height="400px"  />
						<figcaption>
							<h2><span>Configurações</span></h2>
							<p>
								<a href="#"><i class="fas fa-cogs fa-3x"></i></a>
							</p>
						</figcaption>			
					</figure>
				</div>';
		}
			
include_once("footer.php");