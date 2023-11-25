<?php
session_start();
include_once("conexao.php");
$con_id = filter_input(INPUT_GET, 'con_id', FILTER_SANITIZE_NUMBER_INT);
$con_nome = filter_input(INPUT_GET, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!empty($con_id || $con_nome)) {
	$result_usuario = "DELETE FROM contatos WHERE con_id='$con_id' and con_nome='$con_nome'";


	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if (mysqli_affected_rows($conn)) {
		$_SESSION['msg'] = "<p style='color:green;'>Usuário $con_nome,  e seu Id de numero : $con_id,  foi apagado com sucesso</p>";
		header("Location: index.php");
	} else {

		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: index.php");
	}
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: index.php");
}
