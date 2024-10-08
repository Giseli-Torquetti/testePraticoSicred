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
        $sql->bindValue(':senha', hash('sha256', $usuario->getSenha()));
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

    public function alterar(Usuario $usuario) {
        
        $sql = $this->pdo->prepare('update usuarios set nome_usuario = :nome, email_usuario = :email ,login_usuario = :login, senha_usuario = :senha, id_nivel_usuario = :id_nivel_usuario where id_usuario = :id_usuario');
        $sql->bindValue(':nome', $usuario->getNome());
        $sql->bindValue(':email', $usuario->getEmail());
        $sql->bindValue(':login', $usuario->getLogin());
        $sql->bindValue(':senha', hash('sha256', $usuario->getSenha()));
        $sql->bindValue(':id_usuario', $usuario->getId());
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

    public function excluir(Usuario $usuario) {
        $sql = $this->pdo->prepare('delete from usuarios where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $usuario->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
            return false;
        }
    }

    public function getUsuario($id) {
        $sql = $this->pdo->prepare('select * from usuarios where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario;

                $usuario->setId($dados->id_usuario);
                $usuario->setNome($dados->nome_usuario);
                $usuario->setEmail($dados->email_usuario);
                $usuario->setLogin($dados->login_usuario);
                $usuario->setSenha($dados->senha_usuario);
                $usuario->setIdNivel($dados->id_nivel_usuario);

                return $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    public function getUsuarios() {
        $sql = $this->pdo->prepare('select * from usuarios');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario;
               
                $usuario->setId($dados->id_usuario);
                $usuario->setNome($dados->nome_usuario);
                $usuario->setEmail($dados->email_usuario);
                $usuario->setLogin($dados->login_usuario);
                $usuario->setSenha($dados->senha_usuario);
                $usuario->setIdNivel($dados->id_nivel_usuario);

                $lista[] = $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    public function login($login, $senha) {
        $sql = $this->pdo->prepare('select * from usuarios where login_usuario = :login and senha_usuario = :senha');
        $sql->bindValue(':login', $login);
        $sql->bindValue(':senha', $senha);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {          
                $usuario = new Usuario;
                $usuario->setId($dados->id_usuario);
                $usuario->setNome($dados->nome_usuario);
                $usuario->setEmail($dados->email_usuario);
                $usuario->setLogin($dados->login_usuario);
                $usuario->setSenha($dados->senha_usuario);
                $usuario->setIdNivel($dados->id_nivel_usuario);
                return $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

    }

}

?>