<?php
require('base.php');
include( DIR_BASE . '\negocio\login\Sessao.php');

$sessao = new Sessao();
if ($sessao->id_usuario == null){
	//se não estiver autenticado direciona para o login
    header("Location: ./aplicacao/index.html");
}elseif ($sessao->nivel == 1) {
	//se estiver autenticado e é administrador
    header("Location: " . URL_BASE . "/negocio/usuarios/lista_usuarios.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <section class="d-flex flex-column justify-content-center align-items-center vh-100">
            <div class="text-center">
                <a href='./negocio/login/logout.php' class='btn btn-danger mb-4'>Sair</a>
                <hr>
                <h1 class='display-1 fw-bold'>Bem-vindo user, <?php echo $sessao->nome_usuario; ?>!</h1>
                <p class='lead'>Melhorias para seu usuário em construção.</p>
                <hr>
            </div>
        </section>
    </main>

    <footer>
    </footer>
</body>
</html>