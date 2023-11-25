<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>CRUD - Listar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<table class="table-responsive">
		
	</table>
	<a href="cadastrar.php">Cadastrar</a><br>

	<a href="pesquisar.php">Pesquisar</a><br>
	<h1>Lista de Usuários</h1>

	<?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;


$qnt_result_pg = 3;

//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$result_usuarios = "SELECT *FROM contatos LIMIT $inicio, $qnt_result_pg";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
echo"<table  class ='table' border='1' colspan=2  style='width:100%'>";
echo "<thead>";
echo "<tr>";
echo "<th>" . "ID" . "<br/>" . "</th>";
echo "<th>" . "NOME" . "<br/>" . "</th>";
echo "<th>" . "TELEFONE" . "<br/>" . "</th>" ;
echo "<th>" . "CPF" . "<br/>" . "</th>";
echo "<tr/>";

while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {

    echo "<td>" . $row_usuario['con_id'] . '</td>';
    echo "<td>" . $row_usuario['con_nome'] . '</td>';

    echo "<td>" . $row_usuario['con_cpf'] . '</td>';

    echo "<td>" . $row_usuario['con_telefone'] . '</td>';
    echo "<td>" .
            "<a href='editar_usuario.php?con_id=" . $row_usuario['con_id'] . "'>Editar</a>" . "</td>";
    echo "<td>" .
        "<a href='deletar_usuario?con_nome=" . $row_usuario['con_nome'] . '&con_id=' . $row_usuario['con_id'] . "'>Apagar</a><br><hr>" . "</td>";
    echo "</tr>";

}

echo "</tbody>";
echo "</table>";

$result_pg = "SELECT COUNT(con_id) AS num_result FROM contatos";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;
echo "<a href='index.php?pagina=1'>Primeira</a> ";

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
    if ($pag_ant >= 1) {
        echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
    }
}

echo "$pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
    if ($pag_dep <= $quantidade_pg) {
        echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
    }
}

echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";

?>
</body>

</html>