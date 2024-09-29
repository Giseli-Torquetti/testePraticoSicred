<?php
require_once('../../base.php');
require_once(DIR_BASE . '\persistencia\DAO\UsuarioDAO.php');
require_once(DIR_BASE . '\negocio\login\Sessao.php');

$s = new Sessao();

if ($s->verificarSessao()) {
    echo "<a href='../login/logout.php' class='btn btn-danger'>Sair</a><br/>";
}
?>

<?php
require('../../base.php'); 
$url = URL_BASE . "/negocio/usuarios/usuarioCRUD.php";

$usuarioDAO = new UsuarioDAO();

$lista = $usuarioDAO->getUsuarios();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Lista de Usuários</h2>

        <?php if ($lista != null) : ?>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->getNome(); ?></td>
                    <td>
                        <a href="<?php echo $url . "?operacao=editar&id=" . $usuario->getId(); ?>" class="btn btn-secondary btn-sm">Editar</a>
                        <a href="<?php echo $url . "?operacao=excluir&id=" . $usuario->getId(); ?>" class="btn btn-dark btn-sm">Deletar</a>
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
