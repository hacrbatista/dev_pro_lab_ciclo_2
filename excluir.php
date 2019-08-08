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