<?php
class Sessao
{
    // declaração de propriedade
	public $id_usuario;
	public $nome_usuario;
	public $login;
	public $nivel;

	function __construct(){
		if(session_id() == '') {
			session_start();
		}

		if (isset($_SESSION['id_usuario'])) {
			$this->id_usuario = $_SESSION['id_usuario'];
			$this->nome_usuario = $_SESSION['nome_usuario'] ;
			$this->login = $_SESSION['login'];
			$this->nivel = $_SESSION['nivel'];
		}
	}

	public function criarSessao(Usuario $usuario){
		if(session_id() == '') {
			session_start();
		}

		$_SESSION["id_usuario"]= $usuario->getId(); 
		$_SESSION["nome_usuario"] = $usuario->getNome(); 
		$_SESSION["login"] = $usuario->getLogin(); 
		$_SESSION["nivel"]= $usuario->getIdNivel();
	}

	public function destruirSessao(){
		if(session_id() == '') {
			session_start();
		}

		$_SESSION["id_usuario"]= null; 
		$_SESSION["nome_usuario"] = null; 
		$_SESSION["login"] = null; 
		$_SESSION["nivel"]= null;
	}

	public function verificarSessao(){
		if ($this->id_usuario == null) {
			return false;
		}else{
			return True;
		}
	}

}
?>

