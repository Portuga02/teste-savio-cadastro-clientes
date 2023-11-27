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
	<title>Editar Usuário</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" role="button" href="index.php">Voltar ao Home</a><br>
				</li>
			</ul>
		</div>
	</nav>

	<div class="col-sm-12">
		<h1>Edição de Usuários da Plataforma</h1>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form class="form-group" method="POST" action="config_edit_usuario.php">

			<input type="hidden" name="con_id" value="<?php echo $row_usuario['con_id']; ?>">
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="validationCustom01">Nome</label>
					<input type="text" name="con_nome" class="form-control" id="validationCustom01" value="<?php echo $row_usuario['con_nome'];  ?>">
					<div class="valid-feedback">
						Digite o Seu nome!
					</div>
				</div>

			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="validationCustom03">CPF</label>				
					<input type="text" name="con_cpf" class="form-control" placeholder="CPF" id="validationCustom03"  value="<?php echo $row_usuario['con_cpf']; ?>">
					<div class="invalid-feedback">
						Digite seu CPF com traços e pontos!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom04">Telefone</label>
					<input type="text" name="con_telefone" class="form-control" id="validationCustom04" value="<?php echo $row_usuario['con_telefone'];?> "/>
					<div class="invalid-feedback">
						Digite seu telefone com DDD!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom05">Cidade</label>
					<select class="custom-select" name="bre_id" id="validationCustom05">

						<?php
						$sql  = mysqli_query($conn, "SELECT bre_id,bre_nome FROM brasil_cidades ");

						while ($resultado = mysqli_fetch_array($sql)) { ?>
							<option value="<?= $resultado['bre_id'] ?>"><?php echo $resultado['bre_nome']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom06">Estado</label>
					<select class="custom-select" name="bro_id" id="validationCustom06">
						<?php
						$sql  = mysqli_query($conn, "SELECT bro_id, bro_nome FROM brasil_estados ");

						while ($resultado = mysqli_fetch_array($sql)) { ?>
							<option value="<?= $resultado['bro_id'] ?>"><?php echo $resultado['bro_nome']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Enviar Dados</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>