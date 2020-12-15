<?php 



require "lista.model.php";
require "lista.service.php";
require "conexao.php";
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/





$acao = isset($_GET['acao']) ? $_GET['acao'] : 0 ;





if ($acao === 'inserir'){


	$categoriaValor = $_POST['categoria'];

	$acao = $_GET['acao'];


	$tarefa = new Tarefa();
	$ideal = new Tarefa();
	$coluna = new Tarefa();


	$tarefa->__set('item', $_POST['item']);	
	$ideal->__set('ideal', $_POST['quantidade']);


	if ($categoriaValor == 1) {
		$categoriaValor = 'consumo';
	} else if ($categoriaValor == 2) {
		$categoriaValor = 'limpeza';
	}

	$coluna->__set('coluna', $categoriaValor);	

	//$coluna->__set('coluna', 'ideal');	
	
	echo "<br>";

	$conexao = new Conexao();
	$tarefaService = new tarefaService($conexao, $tarefa, $ideal, $coluna);
	$tarefaService->inserir();
	header('location: nova_tarefa.php?categoria='.$teste."");
	//$tarefaService->inserirIdeal();


	//setando produto usando a variavel ideal	
	//$coluna->__set('coluna', 'categoria');
	
	//$tarefaService->inserirCategoria();


}

//recuperando informações do banco de dados
else if ($acao == 'recuperar') {
	
	$tarefa = new Tarefa();
	$conexao = new Conexao();
	

	$tarefaService = new tarefaService($conexao, $tarefa, 0, 0);

	$tarefas = $tarefaService->recuperar();

	
	//resetar 
	if (isset($_GET['resetar'])) {
		

		foreach ($tarefas as $indice => $carregado) {

		echo "<pre>";
		print_r($carregado->ideal);
		echo "</pre>";

	//atualizando real

	$tarefa = new Tarefa();
	$tarefa->__set('real', 0);
	$tarefa->__set('id', $carregado->id);
	$conexao = new Conexao();
	$coluna = 'real';

	//atualizando pendente automaticamente

	$tarefaService = new tarefaService($conexao, $tarefa, 0, $coluna);


	$tarefas = $tarefaService->atualizarReal();


	
	$pendente = - $carregado->ideal;

	$tarefa->__set('diferenca', $pendente);
	$coluna = 'pendente';	

	$tarefaService = new tarefaService($conexao, $tarefa, 0, $coluna);
	$tarefas = $tarefaService->atualizarReal();
	header('location: todas_tarefas.php?acao=recuperar');

			# code...



		}
		
	//	header('location: todas_tarefas.php?acao=recuperar');
		# code...
	}

		# code...
	




} else if ($acao === 'atualizarIdeal') {


	//atualizando real

	$tarefa = new Tarefa();
	$tarefa->__set('real', $_POST['tarefa']);
	$tarefa->__set('id', $_POST['id']);
	$conexao = new Conexao();
	$coluna = 'real';

	//atualizando pendente automaticamente

	$tarefaService = new tarefaService($conexao, $tarefa, 0, $coluna);


	$tarefas = $tarefaService->atualizarReal();


	$atualIdeal = $tarefas[0]['ideal'];
	$atualReal = $_POST['tarefa'];

	$pendente = $atualReal - $atualIdeal;

	$tarefa->__set('diferenca', $pendente);
	$coluna = 'pendente';	

	$tarefaService = new tarefaService($conexao, $tarefa, 0, $coluna);
	$tarefas = $tarefaService->atualizarReal();

	header('location: todas_tarefas.php?acao=recuperar');
	


}else if ($acao == 'comprado') {

	$coluna = 'real';
	$tarefa = new Tarefa();
	$conexao = new Conexao();	
	$tarefa->__set('real', $_GET['ideal']);
	$tarefa->__set('id', $_GET['id']);
	$tarefa->__set('diferenca', 0);
	$tarefaService = new tarefaService($conexao, $tarefa, $tarefa, $coluna);
	$tarefas = $tarefaService->atualizarReal();	



	$coluna = 'pendente';	
	$tarefa->__set('diferenca', 0);
	$tarefaService = new tarefaService($conexao, $tarefa, $tarefa, $coluna);
	$tarefas = $tarefaService->atualizarReal();	


	
	$tarefas = $tarefaService->atualizarReal();
	//$tarefas = $tarefaService->recuperar();

	

	$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0 ;




	//carregar pagina todas ou index
	if ($pagina == "todas") {
	header('location: todas_tarefas.php?acao=recuperar&tudo=ok');

	print_r($_GET['pagina']);
		# code...
	}else if ($pagina == "index") {

	
	header('location: index.php?acao=recuperar&tudo=não');


	//atualizando pendente
	/*$pendente = 0;
	$tarefa->__set('diferenca', $pendente);
	$coluna = 'pendente';	

	$tarefaService = new tarefaService($conexao, $tarefa, 0, $coluna);
	$tarefas = $tarefaService->atualizarReal();	


//	$tarefas = $tarefaService->recuperar();
	# code...*/
	}

} else if ($acao == "apagar") {

	$tarefa = new Tarefa();
	$conexao = new Conexao();

	$tarefa->__set('id', $_GET['id']);

	$tarefaService = new tarefaService($conexao, $tarefa, 0, 0);

	$tarefaService->remover();





	header('location: todas_tarefas.php?acao=recuperar');

}



else {
	print_r($acao);
	echo "tudo ok";
}


	




?>