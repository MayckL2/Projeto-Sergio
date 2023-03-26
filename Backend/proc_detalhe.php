<?php

session_start();
include_once("../rotas.php");
include_once($connRoute);

$id = $_POST['id'];
$hora_saida = $_POST['horasaida'];
$value = $_POST['valor'];


$comando = "update registros set
    Horario_saida = '$hora_saida', Valor_pago = '$value'
    where PK_registro = '$id'";

mysqli_query($conn, $comando);

if (mysqli_affected_rows($conn) > 0) {
    header("Location: " . $listaRoute);
} else {
    echo '<p>Fechamento de registro nâo efetuado</p>';
}
