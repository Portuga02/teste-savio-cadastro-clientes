<?php
include_once "conexao.php";
?>
<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>

	<h1>Pesquisa de Usuários do sistema</h1>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="cadastrar.php">Cadastrar</a>
		<a class="navbar-brand" href="index.php">Listar</a>
	
	<form method="POST" class="form-inline" action="">
		<input id="tags" class="form-control mr-sm-2" name="con_nome" type="search" placeholder="buscar" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" name="campo_pesquisa" type="submit" value="Pesquisar">Pesquisar</button>
	</form>
	</nav>
	<?php
	$campo_pesquisa = filter_input(INPUT_POST, 'campo_pesquisa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	if ($campo_pesquisa) {

		$con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$result_usuario = "SELECT
						contatos.con_id,
						contatos.con_nome,
						contatos.con_cpf,
						contatos.con_telefone,
						brasil_estados.bro_sigla,
						brasil_cidades.bre_nome
					FROM
						contatos
					 JOIN brasil_cidades ON contatos.bre_id = brasil_cidades.bre_id 
					 	
					 JOIN brasil_estados ON contatos.bro_id = brasil_estados.bro_id LIMIT 10";

		$resultado_usuario = mysqli_query($conn, $result_usuario);
		echo "<table  class='table table-striped' >";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope='col'>" . "ID" . "<br/>" . "</th>";
		echo "<th scope='col'>" . "NOME" . "<br/>" . "</th>";
		echo "<th scope='col'>" . "TELEFONE" . "<br/>" . "</th>";
		echo "<th scope='col'>" . "CPF" . "<br/>" . "</th>";
		echo "<th scope='col'>" . "CIDADE" . "<br/>" . "</th>";
		echo "<th scope='col'>" . "UF" . "<br/>" . "</th>";
		echo "<th scope='col'colspan= 2>" . "AÇÕES" . "<br/>" . "</th>";
		echo "<tr/>";
		echo "</thead>";
		echo "<tbody>";
		while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

			echo "<td>" . $row_usuario['con_id'] . '</td>';
			echo "<td>" . $row_usuario['con_nome'] . '</td>';
			echo "<td>" . $row_usuario['con_cpf'] . '</td>';
			echo "<td>" . $row_usuario['con_telefone'] . '</td>';
			echo "<td>" . $row_usuario['bre_nome'] . '</td>';
			echo "<td>" . $row_usuario['bro_sigla'] . '</td>';
			echo "<td>" .
				"<a class='btn btn-primary'  role='button' href='editar_usuario.php?con_id=" . $row_usuario['con_id'] . "'>Editar</a>" . "</td>";
			echo "<td>" .
				"<a class='btn btn-primary'  role='button' href='deletar_usuario?con_nome=" . $row_usuario['con_nome'] . '&con_id=' . $row_usuario['con_id'] . "'>Apagar</a><br><hr>" . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>