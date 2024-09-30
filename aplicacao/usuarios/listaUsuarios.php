<?php
require_once('../../negocio/login/Sessao.php');
require_once('../../negocio/usuarios/lista_usuarios.php'); 

$s = new Sessao();
if ($s->nivel == "2") {
    echo ("<script>
    window.location.href='" . URL_BASE . "../index.php';
    </script>");
}
if ($s->verificarSessao()) {
    echo "<a href='../../negocio/login/logout.php' class='btn btn-danger mb-4'>Sair</a><br/>";
} else {
    echo ("<script>
        window.alert('Sessão expirada. Favor fazer login novamente.');
        window.location.href='" . URL_BASE . "/aplicacao/login/formLogin.php';
        </script>");
} 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Bem-vindo, <?php echo $s->nome_usuario; ?>!</h2>
        <p class="lead text-center mb-4">Gerencie seus usuários abaixo:</p>

        <?php if (isset($listaUsuarios) && !empty($listaUsuarios)) : ?>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Tipo de Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaUsuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->getNome(); ?></td>
                    <td><?php echo $usuario->getEmail(); ?></td>
                    <td><?php echo $usuario->getLogin(); ?></td>
                    <td>
                        <?php if ($usuario->getIdNivel() == 1): ?>
                            Admin
                        <?php else: ?>
                            Usuário
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="../../negocio/usuarios/usuarioCRUD.php?operacao=editar&id=<?php echo $usuario->getId(); ?>" class="btn btn-secondary btn-sm">Editar</a>
                        <a href="../../negocio/usuarios/usuarioCRUD.php?operacao=excluir&id=<?php echo $usuario->getId(); ?>" class="btn btn-dark btn-sm">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
        <p class="alert alert-warning">Nenhum usuário cadastrado</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
