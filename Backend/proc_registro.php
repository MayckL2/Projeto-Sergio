<?php
session_start();
include_once("conexao.php");

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Olá, " . $_SESSION['id'] . "!";
} else {
    echo "Por favor, faça o login primeiro.";
}

$nome = htmlspecialchars($_POST['nome']);
$telefone = htmlspecialchars($_POST['telefone']);
$placa = htmlspecialchars($_POST['placa']);
$hoje = date('Y-m-d');
$hora = date('H:i:s');
$replaceTel = ['(', ')', '-'];

$telefone = str_replace($replaceTel, '', $telefone);

$result_empresa = "INSERT INTO registros
(PK_Registro, FK_Usuario, Nome, Telefone, Placa, Data, Horario_ent)
VALUES (default, '".$_SESSION['id']."' , '$nome', '$telefone', '$placa', '$hoje', '$hora')";

$resultado_empresa = mysqli_query($conn, $result_empresa);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style= 'color:green;'>Registro realizado com sucesso</p>";
    header("Location: lista.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Registro não foi realizado</p>";
    header('Location: registro.php');
}
