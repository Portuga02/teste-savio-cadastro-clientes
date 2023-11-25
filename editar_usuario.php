<?php
session_start();
include_once("conexao.php");
$con_id = filter_input(INPUT_GET, 'con_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM contatos WHERE con_id = '$con_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Editar Usuários</title>
</head>

<body>
	<nav>
		<a href="index.php">Voltar ao Home</a><br>
	</nav>
	<h1>Edição de Usuários da Plataforma</h1>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<form method="POST" action="config_edit_usuario.php">

		<input type="hidden" name="con_id" value="<?php echo $row_usuario['con_id']; ?>">

		<label>Nome: </label>
		<input type="text" name="con_nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['con_nome']; ?>"><br><br>

		<label>Telefone: </label>
		<input type="text" name="con_telefone" placeholder="digite seu telefone" value="<?php echo $row_usuario['con_telefone']; ?>"><br><br>

		<label>CPF: </label>
		<input type="text" name="con_cpf" placeholder="digite seu cpf sem pontos e traços" value="<?php echo $row_usuario['con_telefone']; ?>"><br><br>

		<input type="submit" value="Editar Usuário">
	</form>
</body>

</html>