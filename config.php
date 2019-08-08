<?php
session_start();

global $pdo;

try {
	$pdo = new PDO("mysql:dbname=dev_pro_lab_ciclo_2;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}
?>