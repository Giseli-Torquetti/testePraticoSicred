<?php
require('../../base.php');
include( DIR_BASE . "\persistencia\modelos\Conexao.php");
include( DIR_BASE . "\persistencia\modelos\Usuario.php");

class UsuarioDAO extends Conexao {

    protected $pdo;

    function __construct()
    {
        parent::__construct( );
    }

    public function inserir(Usuario $usuario) {
        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome_usuario, email_usuario, login_usuario, senha_usuario, id_nivel_usuario) VALUES (:nome, :email, :login, :senha, :id_nivel_usuario)');
        
        $sql->bindValue(':nome', $usuario->getNome());
        $sql->bindValue(':email', $usuario->getEmail());
        $sql->bindValue(':login', $usuario->getLogin());
        $sql->bindValue(':senha', md5($usuario->getSenha()));
        $sql->bindValue(':id_nivel_usuario', $usuario->getIdNivel());
    
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
            return false;
        }
    }

}

?>