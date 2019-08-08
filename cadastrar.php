<?php require "pages/header.php"; ?>
<?php

if(!isset($_SESSION['login']) && empty($_SESSION['login'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

$msg = false;
if(isset($_POST['nome']) && !empty($_POST['nome']) &&
	isset($_POST['login']) && !empty($_POST['login']) &&
	isset($_POST['senha']) && !empty($_POST['senha'])) {

	$nome = addslashes($_POST['nome']);
	$login = addslashes($_POST['login']);
	$senha = addslashes($_POST['senha']);
	$status = addslashes($_POST['status']);

	require "classes/usuarios.class.php";
	$u = new Usuarios();

	if($u->addUsuario($nome, $login, $senha, $status)) {
		$msg = 'cadastrado';
	} else {
		$msg = 'existe';
	};
}
?>

<header id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img class="logo" src="assets/images/logo-devpro.png">
				<h3>DevProLab - Ciclo 2</h3>
			</div>
		</div>
	</div>
</header>

<section id="fundo-topo">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Cadastro de Usuários</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if($msg === 'cadastrado'){ ?>
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Usuário cadastrado com sucesso!
				</div>
				<?php }?>
				<?php if($msg === 'existe'){ ?>
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Login <strong><?php echo $login;?></strong> já cadastrado, usar outro!
				</div>
				<?php }?>
				<form method="POST" class="form-cadastrar">
					<div class="col-md-5">
						<div class="form-group">
							<input type="text" name="nome" class="form-control" placeholder="Nome*:">
						</div>
						<div class="form-group">
							<input type="text" name="login" class="form-control" placeholder="Login*:">
						</div>
						<div class="form-group">
							<input type="text" name="senha" class="form-control" placeholder="Senha*:">
						</div>
						<div class="form-group">
							<input type="text" name="confirmar_senha" class="form-control" placeholder="Confirmar Senha*:">
						</div>
						<div class="form-group">
							<select name="status" id="status" class="form-control">
								<option value="" disabled selected>Status</option>
								<option value="Ativo">Ativo</option>
								<option value="Inativo">Inativo</option>
							</select>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="submit" name="salvar" value="Salvar" class="btn btn-default btn-buscar">
							<input type="reset" name="limpar" value="Limpar" class="btn btn-default btn-limpar">
							<a href="index.php" class="btn btn-default btn-novo">Retornar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php require "pages/footer.php"; ?>