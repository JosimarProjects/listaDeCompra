<?php

$acao = 'recuperar';
require 'tarefa_controller.php';


?>




<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista de Compras</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


		<script>
			

			function comprado(id, ideal) {

				window.location.href = "index.php?acao=comprado&ideal="+ideal+"&id="+id+"&pagina=index";



			}	


		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista de Compras
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Compras pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Novo item</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todos itens</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Compra pendentes</h4>
								<hr />
									<table>	
							<h6 >Bens de Consumo</h6>
									
							<tr>
								<td class="pr-3">Descrição</td>		
								<td class="pr-3">Disponivel</td>
								<td class="pr-3">Ideal</td>
								<td class="pr-3">Comprar</td>

							</tr>						
							
							<?foreach ($tarefas as $indice => $tarefa) {
								
							if ($tarefas[$indice]->categoria == 'consumo' and $tarefa->pendente < 0) {
								
							

							 ?>

								
								
								<tr class="mb-3">
								<td class="pr-3 text-justify"  align="center"><?= $tarefas[$indice]->item ?></td>	
					
									
								<td class="pr-3" id="tarefa_<?=$tarefas[$indice]->id?>" align="center"><?= $tarefas[$indice]->atual ?></td>
								<td class="pr-3" align="center"><?= $tarefas[$indice]->ideal ?></td>
								<td class="pr-3" align="center"> <?= $tarefas[$indice]->pendente ?> </td>
								
								
								<td><i class="pr-3 fas fa-check-square fa-lg text-success" onclick="comprado(<?= $tarefa->id ?>, <?= $tarefas[$indice]->ideal ?>)"></i></td>						

							</tr>

								<? } ?>	
							
							<? }   ?>
						

						
						</table>

							<br>
							<br>
							<br>
							<br>

							<table>	
							<h6 >Limpeza</h6>
									
							<tr>
								<td class="pr-3">Descrição</td>		
								<td class="pr-3">Disponivel</td>
								<td class="pr-3">Ideal</td>
								<td class="pr-3">Comprar</td>

							</tr>						
							
							<?foreach ($tarefas as $indice => $tarefa) {
								
							if ($tarefas[$indice]->categoria == 'limpeza' and $tarefa->pendente < 0) { ?>

						
								
								<tr class="mb-3">
								<td class="pr-3 text-justify"  align="center"><?= $tarefas[$indice]->item ?></td>	
					
									
								<td class="pr-3" id="tarefa_<?=$tarefas[$indice]->id?>" align="center"><?= $tarefas[$indice]->atual ?></td>
								<td class="pr-3" align="center"><?= $tarefas[$indice]->ideal ?></td>
								<td class="pr-3" align="center"> <?= $tarefas[$indice]->pendente ?> </td>
											
								<td><i class="pr-3 fas fa-check-square fa-lg text-success" onclick="comprado(<?= $tarefa->id ?>, <?= $tarefas[$indice]->ideal ?>)"></i></td>						

							</tr>

								<? } ?>	
							
							<? }   ?>
						

						
						</table>			
						

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>