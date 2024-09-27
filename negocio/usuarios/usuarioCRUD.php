<?php
require_once('../../base.php');
require_once( DIR_BASE . '\persistencia\DAO\UsuarioDAO.php');
require_once( DIR_BASE . '\persistencia\modelos\Usuario.php');

function usuarioCRUD (Usuario $usuario, $operacao){
	$resultado = false;
	$usuarioDAO = new UsuarioDAO();

	if ($operacao == 'I') {
		$resultado = $usuarioDAO->inserir($usuario);
	}

	if($resultado){
		echo ("<script>
			window.alert('Operação realizada com sucesso');
			
			</script>");
	}
	else{
		echo ("<script>
			window.alert('Ocorreu um erro na operação');
			</script>");
	}
	echo ("<script>
		window.location.href='./lista_usuarios.php';
		</script>");

}

function insereUsuario (){
	$usuario = new Usuario;
	$usuario->setNome($_POST['nome']);
	$usuario->setEmail($_POST['email']);
	$usuario->setLogin($_POST['login']);
	$usuario->setSenha($_POST['senha']);
	$usuario->setIdNivel(2);

	usuarioCRUD ($usuario, 'I');
}


$operacao = '';
if (isset($_POST["operacao"])){
	$operacao = $_POST['operacao'];	
}
if (isset($_GET["operacao"])){
	$operacao = $_GET['operacao'];	
}

if ($operacao == 'inserir'){
	insereUsuario();
}
