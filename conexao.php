<?php
try {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "testephp";
    if ($conn) {
        $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    } else {
        mysqli_connect_error();
    }
} catch (\Throwable $th) {
    throw $th;
}
