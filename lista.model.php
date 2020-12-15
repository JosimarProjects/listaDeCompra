<?php


class Tarefa {
	
	private $id;
	private $id_status;
	private $item;
	private $ideal;
	private $real;
	private $diferenca;	
	private $categoria;
	private $coluna;

	public function __get($atributo) {
		return $this->$atributo;

	}


	public function __set($atributo, $valor) {
		 $this->$atributo = $valor;
	}

}









?>