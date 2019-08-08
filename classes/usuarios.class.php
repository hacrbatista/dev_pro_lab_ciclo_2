<?php
class Usuarios {

	public function verificarLogin($login, $senha) {
		global $pdo;

		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE login = :login AND senha = :senha");
		$sql->bindValue(":login", $login);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {

			$dado = $sql->fetch();
			$_SESSION['login'] = $dado['id'];

			return true;
		} else {
			return false;
		}

	}

	public function addUsuario($nome, $login, $senha, $status) {
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
		$sql->bindValue(":login", $login);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET id_pai = :id_pai, nome = :nome, login = :login, senha = :senha, status = :status");
			$sql->bindValue(":id_pai", $_SESSION['login']);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":login", $login);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":status", $status);
			$sql->execute();

			return true;
		} else {
			return false;
		}

	}

	public function getUsuarios($id_pai) {
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_pai = :id_pai");
		$sql->bindValue(":id_pai", $id_pai);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
			
		}

		return $array;

	}

	public function getUsuario($id) {
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0) {

			$array = $sql->fetch();
			
		}

		return $array;

	}

	public function editarUsuario($nome, $login, $status, $id) {
		global $pdo;

		$sql = $pdo->prepare("SELECT login FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado_login = $sql->fetch();

			if($login != $dado_login['login']) {

				$sql = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
				$sql->bindValue(":login", $login);
				$sql->execute();

				if($sql->rowCount() == 1) {
					return false;
					exit;
				}

			}

		}

		$sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, login = :login, status = :status WHERE id = :id");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":login", $login);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);
		$sql->execute();

		return true;

	}

	public function excluirUsuario($id) {
		global $pdo;

		$sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

}

?>