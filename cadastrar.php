<?php
session_start();
include_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
	<div class="col-12">
		<a class="btn btn-primary" href="index.php">Listar</a>
		<h1>Cadastrar Usuário</h1>
		<?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
?>

		<form method="POST" action="cadastrar_usuario.php" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="validationCustom01">Nome</label>
					<input type="text" name="con_nome" class="form-control" id="validationCustom01" placeholder="Sávio" required>
					<div class="valid-feedback">
						Digite o Seu nome!
					</div>
				</div>

			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="validationCustom03">CPF</label>
					<input type="text" name="con_cpf" class="form-control" placeholder="CPF" id="validationCustom03" required>
					<div class="invalid-feedback">
						Digite seu CPF com traços e pontos!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom04">Telefone</label>
					<input type="text" name="con_telefone" class="form-control" id="validationCustom03" required>
					<div class="invalid-feedback">
						Digite seu telefone com DDD!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom04">Cidade</label>
					<select select class="custom-select">

						<?php
                $sql  = mysqli_query($conn, "SELECT bre_id,bre_nome FROM brasil_cidades "); ?>
						<?php
                while ($resultado = mysqli_fetch_array($sql)) { ?>
							<option value="<?= $resultado['bre_id'] ?>"><?php echo $resultado['bre_nome']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3 mb-3">
				<label for="validationCustom04">Estado</label>
					<select class="custom-select"><?php
                                            $sql  = mysqli_query($conn, "SELECT bro_id, bro_nome FROM brasil_estados "); ?>
						<?php


                while ($resultado = mysqli_fetch_array($sql)) { ?>
							<option value="<?= $resultado['bro_id'] ?>"><?php echo $resultado['bro_nome']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<button class="btn btn-primary" type="submit">Enviar Dados</button>
		</form>
	</div>
	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {

				var forms = document.getElementsByClassName('needs-validation');

				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>