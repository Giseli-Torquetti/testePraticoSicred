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
	if ($operacao == 'A') {
		$resultado = $usuarioDAO->alterar($usuario);
	}
	if ($operacao == 'E') {
		$resultado = $usuarioDAO->excluir($usuario);
	}

	if($resultado){
		echo ("<script>
				window.alert('Operação realizada com sucesso');
				window.location.href='../../aplicacao/usuarios/listaUsuarios.php';
			</script>");
	}
	else{
		echo ("<script>
				window.alert('Ocorreu um erro na operação');
			</script>");
	}
	echo ("<script>
			window.location.href='../../aplicacao/usuarios/listaUsuarios.php';
		</script>");

}

function localizaUsuario ($id){
	$usuarioDAO = new UsuarioDAO();
	$usuario = $usuarioDAO->getUsuario($id);
	if ($usuario == null) {
		echo ("<script>
			window.alert('Registro não encontrado');
			window.location.href='./fomrLogin.php';
			</script>");
	}

	return $usuario;
}

function insereUsuario (){
	$usuario = new Usuario;
	$usuario->setNome($_POST['nome']);
	$usuario->setEmail($_POST['email']);
	$usuario->setLogin($_POST['login']);
	$usuario->setSenha($_POST['senha']);
	$usuario->setIdNivel(1);

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

if (($operacao == 'editar') || ($operacao == 'excluir')) {
	$usuario = localizaUsuario($_GET['id']);

}

if ($operacao == 'editar'){
	$id  = $usuario->getId();
	$nome  = $usuario->getNome();
	$email  = $usuario->getEmail();
	$login = $usuario->getLogin();
	$id_nivel = $usuario->getIdNivel();
	$senha = '';
	$operacao = "alterar";
	

	$url = "Location: " . URL_BASE . "/aplicacao/usuarios/formCadastro.php?";
	$url = $url . "id_usuario=$id&nome=$nome&email=$email&login=$login&id_nivel=$id_nivel&operacao=$operacao"; 

	header($url);
}

if ($operacao == 'excluir'){
	usuarioCRUD ($usuario, 'E');
}


/*echo ("<script>
	window.alert('".$erro."');
	window.location.href='./lista_usuarios.php';
	</script>");*/
	?>