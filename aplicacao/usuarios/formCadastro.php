<?php	

require('../../base.php'); 
$url = URL_BASE . "/negocio/usuarios/UsuarioCRUD.php";

if(!isset($id))
	$id = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : null;

if(!isset($nome))
	$nome 	= isset($_GET["nome"]) ? $_GET["nome"] : null;

if(!isset($email))
	$email = isset($_GET["email"]) ? $_GET["email"] : null;

if(!isset($login))
	$login 	= isset($_GET["login"]) ? $_GET["login"] : null;

if(!isset($id_nivel_usuario))
	$id_nivel_usuario = isset($_GET["id_nivel_usuario"]) ? intval($_GET["id_nivel_usuario"]) : 1;

if(!isset($operacao))
	$operacao 	= isset($_GET["operacao"]) ? $_GET["operacao"] : "inserir";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
	<header class="header navbar navbar-static-top navbar-fixed-top">
		<div class="container novo-menu-topo">
			<div class="navbar-header" id="home">
				<nav class="navbar navbar-expand-lg navbar-light" id="nav-menu-referencia">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
						aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<nav class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="../index.html">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../usuarios/formCadastro.php">Cadastro</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../login/formLogin.php">Login</a>
							</li>
						</ul>
					</nav>
				</nav>
			</div>
		</div>
	</header>

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
								<input type="password" name="senha" class="form-control" value="" required>
							</div>

							<!-- Inputs escondidos -->
							<input type="hidden" name="id_usuario" value="<?php echo $id ?>">
							<input type="hidden" name="id_nivel_usuario" value="<?php echo $id_nivel_usuario ?>">
							<input type="hidden" name="operacao" value="<?php echo $operacao ?>">

							<!-- Botão de Envio -->
							<input type="submit" value="Enviar" class="btn btn-submit btn-outline-dark w-100">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
	</footer>

</body>
</html>

