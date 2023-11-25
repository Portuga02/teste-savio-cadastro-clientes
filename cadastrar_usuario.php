<?php
session_start();
include_once("conexao.php");

$con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_telefone = filter_input(INPUT_POST, 'con_telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_cpf = filter_input(INPUT_POST, 'con_cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);



$result_usuario = "INSERT INTO contatos (con_nome,con_telefone,con_cpf) VALUES ('$con_nome','$con_telefone','$con_cpf')";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cadastrar.php");
}
