<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de cadastro Sávio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" role="button" href="cadastrar.php">Cadastrar</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" role="button" href="pesquisar.php">Pesquisar</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="col-sm-12">
        <h1>Lista de Usuários</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $qnt_result_pg = 5;

        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_usuarios = "SELECT *FROM contatos LIMIT $inicio, $qnt_result_pg";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
        echo "<table  class='table table-striped' >";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>" . "ID" . "<br/>" . "</th>";
        echo "<th scope='col'>" . "NOME" . "<br/>" . "</th>";
        echo "<th scope='col'>" . "TELEFONE" . "<br/>" . "</th>";
        echo "<th scope='col'>" . "CPF" . "<br/>" . "</th>";
        echo "<th scope='col'colspan= 2>" . "AÇÕES" . "<br/>" . "</th>";
        echo "<tr/>";
        echo "</thead>";
        echo "<tbody>";
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {

            echo "<td>" . $row_usuario['con_id'] . '</td>';
            echo "<td>" . $row_usuario['con_nome'] . '</td>';
            echo "<td>" . $row_usuario['con_cpf'] . '</td>';
            echo "<td>" . $row_usuario['con_telefone'] . '</td>';
            echo "<td>" .
                "<a class='btn btn-primary'  role='button' href='editar_usuario.php?con_id=" . $row_usuario['con_id'] . "'>Editar</a>" . "</td>";
            echo "<td>" .
                "<a class='btn btn-primary'  role='button' href='deletar_usuario?con_nome=" . $row_usuario['con_nome'] . '&con_id=' . $row_usuario['con_id'] . "'>Apagar</a><br><hr>" . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        $result_pg = "SELECT COUNT(con_id) AS num_result FROM contatos";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        //Limitar os link antes depois
        $max_links = 2;
        echo "<a class='btn btn-primary'  role='button' href='index.php?pagina=1'>Primeira</a> ";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                echo "<a class='btn btn-primary'  role='button' href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
            }
        }

        echo "$pagina ";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg) {
                echo "<a class='btn btn-primary'  role='button' href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
            }
        }

        echo "<a class='btn btn-primary'  role='button' href='index.php?pagina=$quantidade_pg'>Ultima</a>";

?>
    </div>
</body>

</html>