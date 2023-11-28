<?php
session_start();
include_once("conexao.php");
$con_id = filter_input(INPUT_GET, 'con_id', FILTER_SANITIZE_NUMBER_INT);
$con_nome = filter_input(INPUT_GET, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!empty($con_id || $con_nome)) {
	$result_usuario = "DELETE FROM contatos WHERE con_id='$con_id' and con_nome='$con_nome'";


	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if (mysqli_affected_rows($conn)) {
		$_SESSION['msg'] = "<div class='alert alert-sucess'><p >Usuário <strong style='color:red'> $con_nome </strong>,  e seu Id de numero : <strong style='color:red'>$con_id</strong>,  foi apagado com sucesso</p> </div>";
		header("Location: index.php");
	} else {

		$_SESSION['msg'] = "<div class='alert alert-danger'><p style='color:red'>Erro o usuário não foi apagado com sucesso</p></div>";
		header("Location: index.php");
	}
} else {
	$_SESSION['msg'] = "<div class='alert alert-warning'><p style='color:yellow'>Necessário selecionar um usuário</p></div>";
	header("Location: index.php");
}
