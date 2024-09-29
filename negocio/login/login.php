<?php 

$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
$senha = isset($_POST["senha"]) ? hash('sha256', ($_POST["senha"])) : FALSE; 

require_once('../../base.php');
require_once( DIR_BASE . '\persistencia\DAO\UsuarioDAO.php');
require_once( DIR_BASE . '\negocio\login\Sessao.php');

$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->login($login, $senha);

if($usuario != null){
	$s = new Sessao();
	$s->criarSessao($usuario);
	echo ("<script>
		   window.alert('Login efetuado');
		   </script>");	 
} 
else 
{ 
	echo ("<script>
		   window.alert('Login e/ou senha inválidos');
		    window.location.href='". URL_BASE . "/aplicacao/login/formLogin.php';
		   </script>");
}
echo ("<script>
	   window.location.href='". URL_BASE . "/negocio/usuarios/lista_usuarios.php';
	   </script>");

?>