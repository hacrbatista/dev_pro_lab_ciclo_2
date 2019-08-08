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
$dados = $u->getUsuarios($_SESSION['login']);

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
				<h1>Listagem de Usuários</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form method="POST">
					<div class="col-md-5">
						<div class="form-group">
							<input type="text" name="nome" class="form-control" placeholder="Nome:">
						</div>
						<div class="form-group">
							<select name="status" id="status" class="form-control">
								<option value="0">Status</option>
								<option value="1">Ativo</option>
								<option value="2">Inativo</option>
							</select>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="submit" name="buscar" value="Buscar" class="btn btn-default btn-buscar">
							<input type="reset" name="limpar" value="Limpar" class="btn btn-default btn-limpar">
							<a href="cadastrar.php" class="btn btn-default btn-novo">Novo</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section id="fundo-base">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<hr>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Nome</th>
			      <th scope="col">Login</th>
			      <th scope="col">Status</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

			  foreach ($dados as $usuario) {
			  	?>
			  	<tr>
			      <th scope="row"><?php echo $usuario['nome'] ?></th>
			      <td><?php echo $usuario['login'] ?></td>
			      <td><?php echo $usuario['status'] ?></td>
			      <td><a href="editar.php?id=<?php echo $usuario['id'] ?>" class="btn btn-primary btn-sm btn-editar">Editar</a> <a href="javascript:;" onclick="excluir('<?php echo $usuario['id']; ?>');" class="btn btn-danger btn-sm btn-excluir">Excluir</a></td>
			    </tr>
			  	<?php
			  }
			  ?>
			  </tbody>
			</table>

			<div id="modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							...
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>

<?php require "pages/footer.php"; ?>