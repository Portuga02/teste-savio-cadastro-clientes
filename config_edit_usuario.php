<?php
session_start();
include_once("conexao.php");
$con_id = filter_input(INPUT_POST, 'con_id', FILTER_SANITIZE_NUMBER_INT);
$con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_telefone = filter_input(INPUT_POST, 'con_telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_cpf = filter_input(INPUT_POST, 'con_cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$result_usuario = "UPDATE contatos SET con_nome='$con_nome', con_telefone='$con_telefone', con_cpf='$con_cpf' WHERE con_id='$con_id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)) {
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso, você tem que selecionar ao menos um campo para se editado</p>";
	header("Location: editar_usuario.php?con_id=$con_id");
}
