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


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Editar Perfil</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-4">
		<a href='./negocio/login/logout.php' class="btn btn-danger mb-4">Sair</a>
		<hr>
		<h2 class="mb-4">Perfil do Usuário</h2>
		<p><strong>Usuário:</strong> <?php echo $sessao->nome_usuario; ?></p>
		<p><strong>Login:</strong> <?php echo $sessao->login; ?></p>
		<hr>

		<h3>Editar Dados</h3>
		<form method="post" action="<?php echo URL_BASE . "/negocio/usuarios/usuarioCRUD.php"; ?>">
			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" name="nome" class="form-control" value="<?php echo $usuario->getNome(); ?>" required>
			</div>

			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $usuario->getEmail(); ?>" required>
			</div>

			<div class="mb-3">
				<label for="login" class="form-label">Login</label>
				<input type="text" name="login" class="form-control" value="<?php echo $usuario->getLogin(); ?>" required>
			</div>

			<div class="mb-3">
				<label for="senha" class="form-label">Senha</label>
				<input type="password" name="senha" class="form-control" value="" placeholder="Deixe em branco para manter a senha atual">
			</div>

			<!-- Inputs escondidos -->
			<input type="hidden" name="id_usuario" value="<?php echo $usuario->getId(); ?>">
			<input type="hidden" name="operacao" value="editar">

			<!-- Botão de envio -->
			<button type="submit" class="btn btn-primary">Atualizar Dados</button>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

?>


