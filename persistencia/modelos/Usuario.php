<?php
class Usuario
{
    // declaração de propriedade
    private $id;
	private $nome;
	private $email;
	private $login;	
	private $senha;	
	private $id_nivel;	
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setLogin($login){
		$this->login = $login;
	}
	public function getLogin(){
		return $this->login;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}	
	public function setIdNivel($id_nivel){
		$this->id_nivel = $id_nivel;
	}
	public function getIdNivel(){
		return $this->id_nivel;
	}
}
?>

