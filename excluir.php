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

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$u->excluirUsuario($_GET['id']);
}

header("Location: index.php");

?>