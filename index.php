<?php
require('base.php');
include( DIR_BASE . '\negocio\login\Sessao.php');

$sessao = new Sessao();
echo "nivel: ". $sessao->nivel . "<br>";
if ($sessao->id_usuario == null){
	//se não estiver autenticado direciona para o login
	header("Location: ./aplicacao/index.html");
}elseif ($sessao->nivel == 1) {
	//se estiver autenticado e é administrador
	header("Location: " . URL_BASE . "/negocio/usuarios/lista_usuarios.php");
}else{
	//se estiver autenticado e não é administrador 
	echo "<a href='./negocio/login/logout.php'>Sair</a><br/>";
	echo "<hr>";
	echo "Usuário: ". $sessao->nome_usuario . "<br>";
	echo "Login: ". $sessao->login. "<br>";
}
?>


