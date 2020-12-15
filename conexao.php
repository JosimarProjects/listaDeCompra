<?php

	class Conexao {


	//private	$host = 'mysql:host=localhost;dbname=lista_de_compras';	


	private	$host = 'localhost';
	private	$dbname = 'lista_de_compras';
	private	$user = 'root';
	private $pass = '';	//software de conexão , local


	
	//tentando conexao


	public function conectar() {

	try {

		$conexao = new PDO(
			"mysql:host=$this->host;dbname=$this->dbname",
			"$this->user",
			"$this->pass"


		);

		//criando tabela banco de dados

		return $conexao;
		

		}

		catch(PDOException $e) {

		/*echo "<pre>";
		print_r($e);
		echo "<pre>";*/

		echo 'erro: ' .$e->getCode(). ' Mensagem: '.$e->getMessage(). ' contate o admnistrador josimar.negocioslmtda@gmail.com';
			}

		}


}

