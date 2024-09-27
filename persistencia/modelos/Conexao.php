<?php

class Conexao
{
	protected $pdo;

	function __construct()
	{
		//conexao com o banco
		try {
			$this->pdo = new PDO('mysql:host=localhost:3306;dbname=testePratico','root','root');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}



	}
}
?>