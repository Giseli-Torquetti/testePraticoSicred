<?php 
require('../../base.php'); 
$url = URL_BASE . "/negocio/login/login.php";
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="container vh-100 justify-content-center align-items-center">
			<div class="row">
				<div class="col-md-12">
					<div class="card-custom">
						<h2 class="text-center mb-4">Login</h2>
						<form method="post" action="<?php echo $url ?>">
							<div class="mb-3">
								<label for="login" class="form-label">Login</label>
								<input type="text" name="login" class="form-control" required>
							</div>
							
							<div class="mb-3">
								<label for="senha" class="form-label">Senha</label>
								<input type="password" name="senha" class="form-control" required>
							</div>

							<input type="submit" value="Logar" class="btn btn-login btn-outline-dark w-100">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="row">
			<div class="col-xs-12">
			</div>
		</div>
	</footer>

</body>

</html>



