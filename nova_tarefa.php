<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista de Compras</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
						<li class="list-group-item"><a href="index.php">Compras pendentes</a></li>
						<li class="list-group-item active"><a href="#">Novo item</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todos os Itens</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo item</h4>
								<hr />

								<form method="POST" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição do item:</label>
										

										<input type="text" class="form-control " name='item' placeholder="Exemplo: Farinha de Trigo">
										<label>Quantidade ideal (somente numeros inteiros):</label>
										<input type="text" class="form-control" name='quantidade' placeholder="Exemplo: 4">
										Categoria:</label>								

										<div class="input-group mb-3">
  											<div class="input-group-prepend">
    											<label class="input-group-text" for="inputGroupSelect01">Opções</label>
  											</div>
										 	 <select name='categoria' class="custom-select" id="inputGroupSelect01">
											    <option selected>Escolher...</option>
											    <option value="1">consumo</option>
											    <option value="2">limpeza</option>											   
											  </select>
                                        </div>								


									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>