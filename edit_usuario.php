<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'con_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM contatos WHERE con_id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>CRUD - Editar</title>
</head>

<body>
	<nav>
		<a href="index.php">Voltar ao Home</a><br>
	</nav>
	<h1>Editar Usuário</h1>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<form method="POST" action="proc_edit_usuario.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['con_id']; ?>">

		<label>Nome: </label>
		<input type="text" name="con_nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['con_nome']; ?>"><br><br>

		<label>Telefone: </label>
		<input type="text" name="con_telefone" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['con_telefone']; ?>"><br><br>

		<label>CPF: </label>
		<input type="text" name="con_cpf" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['con_telefone']; ?>"><br><br>

		<input type="submit" value="Editar">
	</form>
</body>

</html>