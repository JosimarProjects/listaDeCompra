<?



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





				

			//pegando valor disponivel para atualizar

			function editar(id, atual) {

				





				let form = document.createElement('form')

				form.className = "row teste";

				form.action = 'tarefa_controller.php?acao=atualizarIdeal';

				form.method = 'POST'







				let inputTarefa = document.createElement('input')

				inputTarefa.type = 'text'

				inputTarefa.name = 'tarefa'

				inputTarefa.className = "col-6 form-control"

				inputTarefa.placeholder = 'valor:'

			

				//inputTarefa.value = txt_area



				//input escondido carregando o id no POST

				let inputId = document.createElement('input')

				inputId.type = 'hidden'

				inputId.name = 'id'

				inputId.value = id





				//criar botão para o envio do form

				let button = document.createElement('button')

				button.type = 'submit'

				button.className = ' col-ld-6 btn btn-info'

				button.innerHTML = 'Atualizar'









				form.appendChild(inputId)		

				form.appendChild(inputTarefa)			

				form.appendChild(button)





				let tarefa = document.getElementById('tarefa_'+id)



				tarefa.innerHTML = ''



				tarefa.insertBefore(form, tarefa[0])





				

				/*var  teste1 = document.getElementById('tarefa_'+id)

				var parent = teste1.parentNode;

				parent.innerHTML = ''

				//parent.removeChild(teste1);*/



			}





			function comprado(id, ideal) {



				window.location.href = "todas_tarefas.php?acao=comprado&ideal="+ideal+"&id="+id+"&pagina=todas";









			}	



			function resetar() {



				window.location.href = "todas_tarefas.php?acao=recuperar&pagina=todas&resetar=tudo";





			}





			function apagar(id) {



				window.location.href = "todas_tarefas.php?acao=apagar&id="+id+"";



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



		<div class="container app" style="border: 1px solid red">

			<div class="row">

				<div class="col-sm-3 menu">

					<ul class="list-group">

						<li class="list-group-item "><a href="index.php">Compras pendentes</a></li>

						<li class="list-group-item "><a href="nova_tarefa.php">Novo item</a></li>

						<li class="list-group-item active "><a href="#">Todos os itens</a></li>

					</ul>

				</div>



				<div class="col-sm-9">

					<div class="container pagina" style="border: 1px solid orange">

						<div class="row">

							<div class="col">

								<h4>Lista de compras</h4>

								<hr />		



								

								<h5>Indice:</h5>



								<div class="row container" >

								<i  class="col-lg-2  pr-3 fas fa-trash-alt fa-lg text-danger">Apagar</i><br>

								<i class=" col-lg-4 pt-2 pr-3 fas fa-edit fa-lg text-info">Atualizar Disponivel</i><br>

								<i class="col-lg-6 pt-3 pr-3 fas fa-check-square fa-lg text-success">Já possuo estoque:(não comprar) </i>

								</div>





								<br>

								<div class="container row" style="border: 1px solid red">	

								<button class=" col-lg-4 btn btn-warning mb-5 mt-2 d-inline-block text-truncate text-nowrap" onclick="resetar()"> Resetar Estoque Disponivel</button>	

								</div>







						<table class="" style="border: 1px solid blue">	

							<h6 >Bens de Consumo</h6>

									

							<tr class="container row pl-1" style="border: 1px solid red">

								<td class="border col-3">Descrição</td>		

								<td class="border col-3">Disponivel</td>

								<td class="border col-3">Ideal</td>

								<td class="border col-3">Falta</td>



							</tr>						

							

							<?foreach ($tarefas as $indice => $tarefa) {

								

							if ($tarefas[$indice]->categoria == 'consumo') { ?>



						

								

							<tr class="mb-3 container pagina">

								<td class=" border col-3 pr-3 text-justify"  align="center"><?= $tarefas[$indice]->item ?></td>										

								<td class="border col-3 pr-3 pt-2" id="tarefa_<?=$tarefas[$indice]->id?>" align="center"><?= $tarefas[$indice]->atual ?>
								</td>

								<td class="pr-3 pt-2 border col-3" align="center"><?= $tarefas[$indice]->ideal ?></td>

								<td class="pr-3 pt-2 border col-3" align="center"> <?= $tarefas[$indice]->pendente ?> </td>
								</tr>


							<tr>	

										<td><i class="border col-4   fas fa-trash-alt fa-lg text-danger" onclick="apagar(<?= $tarefas[$indice]->id ?>)"></i></td>							

										<td><i class="border  ml-4 col-4  fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefas[$indice]->id ?>, <?= $tarefas[$indice]->atual; ?>)"></i><td>


										<td><i class="mx-auto border col-4  fas fa-check-square fa-lg text-success" onclick="comprado(<?= $tarefa->id ?>, <?= $tarefas[$indice]->ideal ?>)"></i></td>	

											
								</tr>	
							
							
								
						


								<? } ?>	

							
							<? }   ?>

						



						

						</table>



	

					

						







								



						</div>

					</div>

				</div>

			</div>

		</div>

	</body>











	<!-- JavaScript Bundle with Popper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>