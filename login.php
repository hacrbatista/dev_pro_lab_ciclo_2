<?php require "pages/header.php"; ?>
<?php
$msg = false;
if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	$login = addslashes($_POST['login']);
	$senha = addslashes($_POST['senha']);

	require "classes/usuarios.class.php";
	$u = new Usuarios();

	if($u->verificarLogin($login, $senha)) {
		?>
		<script type="text/javascript">window.location.href="index.php";</script>
		<?php
		exit;
	} else {
		$msg = true;
	};
}
?>

<section id="fundo-login">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="login">
					<img class="logo" src="assets/images/logo-devpro.png">
					<h1>DevProLab</h1>
					<h3>Ciclo 2</h3>
					<?php if($msg){ ?>
					<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Usuário e/ou senha errado(s)!
					</div>
					<?php } ?>
					<form method="POST">
						<div class="form-group">
							<input type="text" name="login" class="form-control" placeholder="Login*:" required>
						</div>
						<div class="form-group">
							<input type="password" name="senha" class="form-control" placeholder="Senha*:" required>
						</div>
						<input type="submit" value="LOGIN" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "pages/footer.php"; ?>