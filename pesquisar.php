<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>CRUD - Pesquisar</title>
</head>

<body>
	<a href="cadastrar.php">Cadastrar</a><br>
	<a href="index.php">Listar</a><br>

	<h1>Pesquisar Usuário</h1>

	<form method="POST" action="">
		<label>Nome: </label>
		<input type="text" name="nome" placeholder="Digite o nome"><br><br>

		<input name="campo_pesquisa" type="submit" value="Pesquisar">
	</form><br><br>

	<?php
	$campo_pesquisa = filter_input(INPUT_POST, 'campo_pesquisa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	if ($campo_pesquisa) {
		$con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$result_usuario = "SELECT * FROM contatos WHERE con_nome LIKE '%$con_nome%'"; // join na tabela de cidade e estado
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
			echo "ID: " . $row_usuario['con_id'] . "<br>";
			echo "Nome: " . $row_usuario['con_nome'] . "<br>";
			echo "CPF: " . $row_usuario['con_cpf'] . "<br>";
			echo "<a href='editar_usuario.php?id=" . $row_usuario['con_id'] . "'>Editar</a><br>";
			echo "<a href='deletar_usuario?id=" . $row_usuario['con_id'] . "'>Apagar</a><br><hr>";
		}
	}
	?>
</body>

</html>