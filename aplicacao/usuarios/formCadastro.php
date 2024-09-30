<?php	

require('../../base.php'); 
$url = URL_BASE . "/negocio/usuarios/UsuarioCRUD.php";

if(!isset($id))
	$id = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : null;

if(!isset($nome))
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : null;

if(!isset($email))
	$email = isset($_GET["email"]) ? $_GET["email"] : null;

if(!isset($login))
	$login 	= isset($_GET["login"]) ? $_GET["login"] : null;

if(!isset($senha))
	$senha 	= isset($_GET["senha"]) ? $_GET["senha"] : null;

if(!isset($id_nivel_usuario))
	$id_nivel_usuario = isset($_GET["id_nivel_usuario"]) ? intval($_GET["id_nivel_usuario"]) : 2;

if(!isset($operacao))
	$operacao = isset($_GET["operacao"]) ? $_GET["operacao"] : "inserir";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="../style/css.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</head>

<body>
	<section>
		<div class="container vh-100 justify-content-center align-items-center">
			<div class="row">
				<div class="col-md-12">
					<div class="card-custom">
						<h2 class="text-center mb-4">Cadastro</h2>
						<form method="post" action="<?php echo $url ?>">
							<div class="mb-3">
								<label for="nome" class="form-label">Nome</label>
								<input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" required>
							</div>

							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" class="form-control" value="<?php echo $email ?>" required>
							</div>

							<div class="mb-3">
								<label for="login" class="form-label">Login</label>
								<input type="text" name="login" class="form-control" value="<?php echo $login ?>" required>
							</div>

							<div class="mb-3">
								<label for="senha" class="form-label">Senha</label>
								<input type="password" name="senha" class="form-control" value="<?php echo $senha ?>" required>
							</div>

							<?php if ($operacao != "inserir") : ?>
								<div class="mb-3">
									<label for="id_nivel_usuario" class="form-label">Nivel</label>
									<select name="id_nivel_usuario" id="id_nivel_usuario" class="form-control">
										<option value="1" <?php if($id_nivel_usuario == 1) echo 'selected'; ?>>Administrador</option>
										<option value="2" <?php if($id_nivel_usuario == 2) echo 'selected'; ?>>Usuário</option>
									</select>
								</div>
							<?php endif; ?>

							<!-- Inputs escondidos -->
							<input type="hidden" name="id_usuario" value="<?php echo $id ?>">
							<input type="" name="operacao" value="<?php echo $operacao ?>">

							<button type="submit" class="btn btn-submit btn-outline-dark w-100">
								<?php echo ($operacao == "inserir") ? "Cadastrar" : "Editar Cadastro"; ?>
							</button>
						</form>
						<br>
						<?php if ($operacao == "inserir") : ?>
							<a href="../login/formLogin.php" title="Login">
								<button class="btn btn-outline-dark w-100 mb-3">
								Login
								</button>
							</a>
							<a href="../index.html" title="Voltar ao inicio">
								<button class="btn btn-outline-dark w-100">
									Voltar ao inicio
								</button>
							</a>
						<?php endif; ?>
						<?php if ($operacao != "inserir") : ?>
							<a href="../usuarios/listaUsuarios.php" title="Voltar ao inicio">
								<button class="btn btn-outline-dark w-100">
									Voltar para lista de usuarios
								</button>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
	</footer>

</body>
</html>

