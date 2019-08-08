<?php require "pages/header.php"; ?>
<?php

if(!isset($_SESSION['login']) && empty($_SESSION['login'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

require "classes/usuarios.class.php";
$u = new Usuarios();

$msg = false;
if(isset($_POST['nome']) && !empty($_POST['nome']) &&
	isset($_POST['login']) && !empty($_POST['login'])) {

	$nome = addslashes($_POST['nome']);
	$login = addslashes($_POST['login']);
	$status = addslashes($_POST['status']);

	if($u->editarUsuario($nome, $login, $status, $_GET['id'])) {
		$msg = 'editado';
	} else {
		$msg = 'existe';
	};
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
	
	$usuario = $u->getUsuario($_GET['id']);

} else {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
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
				<h1>Edição de Usuários</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if($msg === 'editado'){ ?>
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Usuário editado com sucesso!
				</div>
				<?php }?>
				<?php if($msg === 'existe'){ ?>
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Login <strong><?php echo $login;?></strong> já cadastrado, usar outro!
				</div>
				<?php }?>
				<form method="POST" class="form-editar">
					<div class="col-md-5">
						<div class="form-group">
							<label>Nome:</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome*:" value="<?php echo $usuario['nome']; ?>">
						</div>
						<div class="form-group">
							<label>Usuário:</label>
							<input type="text" name="login" class="form-control" placeholder="Login*:" value="<?php echo $usuario['login']; ?>">
						</div>
						<div class="form-group">
							<label>Status:</label>
							<select name="status" id="status" class="form-control">
								<option value="Ativo" <?php echo ($usuario['status'] == 'Ativo')?'selected="selected"':''; ?>>Ativo</option>
								<option value="Inativo" <?php echo ($usuario['status'] == 'Inativo')?'selected="selected"':''; ?>>Inativo</option>
							</select>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="submit" name="salvar" value="Salvar" class="btn btn-default btn-buscar">
							<a href="index.php" class="btn btn-default btn-limpar">Mudar Senha</a>
							<a href="index.php" class="btn btn-default btn-novo">Retornar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php require "pages/footer.php"; ?>