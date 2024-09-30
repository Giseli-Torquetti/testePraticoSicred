<?php 
require('../../base.php'); 
$url = URL_BASE . "/negocio/login/login.php";
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="../style/css.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</head>

<body>
	<header></header>
	<main>
		<section>
			<div class="container justify-content-center align-items-center">
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

								<button type="submit" class="btn btn-submit btn-outline-dark w-100">
									Logar
								</button>
							</form>
							<br>
							<a href="../usuarios/formCadastro.php" title="Cadastro">
								<button class="btn btn-outline-dark w-100 mb-3">
									Cadastro
								</button>
							</a>
							<br>
							<a href="../index.html" title="Voltar ao inicio">
								<button class="btn btn-outline-dark w-100">
									Voltar ao inicio
								</button>
							</a>
							
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<div class="row">
			<div class="col-xs-12">
			</div>
		</div>
	</footer>

</body>

</html>
