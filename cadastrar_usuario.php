<?php
session_start();
include_once("conexao.php");

$con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_telefone = filter_input(INPUT_POST, 'con_telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$con_cpf = filter_input(INPUT_POST, 'con_cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$bre_id = filter_input(INPUT_POST, 'bre_id', FILTER_SANITIZE_NUMBER_INT);
$bro_id = filter_input(INPUT_POST, 'bro_id', FILTER_SANITIZE_NUMBER_INT);


$result_usuario = "INSERT INTO contatos (con_nome,con_telefone,con_cpf,bre_id,bro_id) VALUES ('$con_nome','$con_telefone','$con_cpf','$bre_id','$bro_id')";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
	$_SESSION['msg'] = "<div class='alert alert-success'><p>Usuário cadastrado com sucesso</p> </div>";
	header("Location: index.php");
} else {
	$_SESSION['msg'] = "<div class='alert alert-danger'><p >Usuário não foi cadastrado com sucesso</p>  </div>";
	header("Location: cadastrar.php");
}
