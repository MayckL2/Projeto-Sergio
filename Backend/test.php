<?php
include_once("conexao.php");

$result_usuario = "SELECT * FROM usuarios";
$resultado_usuarios = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuarios);

print_r($row_usuario);

// insert into usuarios values (1, 11122233396, 'Violeta', 'Vohor', 'test@example.com', 'Teste', '2023-03-23', 'Adm');
