<?php


class TarefaService {
	private $conexao;
	private $item;
	private $ideal;
	private $coluna;
	private $diferenca;

	



	function __construct($conexao,  $item, $ideal, $coluna) {

		$this->conexao = $conexao->conectar();
		$this->item = $item;
		$this->ideal = $ideal;
		$this->coluna = $coluna;
		$this->diferenca = $item;

	


	}

//create
	public function inserir() {

	$diferenca = (0 - $this->ideal->__get('ideal') );
	$this->item->__set('diferenca', $diferenca);	
	$query = 'insert into tb_lista(item, ideal, categoria, pendente)Values(?, ?, ?, ?)';
	$stmt = $this->conexao->prepare($query);
	$stmt->bindValue(1, $this->item->__get('item'));	
	$stmt->bindValue(2, $this->ideal->__get('ideal'));	
	$stmt->bindValue(3, $this->coluna->__get('coluna'));
	$stmt->bindValue(4,	$this->item->__get('diferenca'));
	$stmt->execute();







	}	

	//atualizando 
	public  function atualizarReal() {
		$coluna = $this->coluna;

		if ($coluna == 'real') {
					# code...
		echo "estmoas aqui";	
		print_r($this->item->__get('real'));			
		print_r($this->item->__get('id'));



		$query = 'update tb_lista set atual = ? where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->item->__get('real'));
		$stmt->bindValue(2, $this->item->__get('id'));
		$stmt->execute();

			


		//atualizando pendente
		$pendente = ' select
						ideal
			          from 
						tb_lista
					where
						 id = ?					  	
		' ;

		$stmt = $this->conexao->prepare($pendente);
		$stmt->bindValue(1, $this->item->__get('id'));
		$stmt->execute();

		print_r($this->item->__get('real'));			
		print_r($this->item->__get('id'));
		return $stmt->fetchAll();

			

	


		} else if ($coluna == 'pendente') {

				print_r($this->item->__get('diferenca'));



				$query = 'update tb_lista set pendente = ? where id = ?';
				$stmt = $this->conexao->prepare($query);
				$stmt->bindValue(1, $this->item->__get('diferenca'));
				$stmt->bindValue(2, $this->item->__get('id'));
				$stmt->execute();





				




			# code...
		}


}
	



	/*$teste = $this->coluna->__get('coluna');	
	$query = 'update tb_lista set ideal = ? where item = ?';
	$stmt = $this->conexao->prepare($query);
	//$stmt->bindValue(1, $this->coluna->__get('coluna'));
	$stmt->bindValue(1, $this->ideal->__get('ideal'));	
	$stmt->bindValue(2, $this->item->__get('item'));	

	return	$stmt->execute();	*/
	
	

	





	public function recuperar() {

	$query = '
	
		select
			 *
		from
			tb_lista
		order by 
			item asc	


	';
	$stmt = $this->conexao->prepare($query);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);	

	}



	public function remover() {
		//echo "cheguei";
		//print_r($this->item->__get('id'));
		$query = 'delete from tb_lista where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->item->__get('id'));	
		$stmt->execute();	




		
	}	

}



?>