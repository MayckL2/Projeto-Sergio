<?php
session_start();
include_once("../rotas.php");
include_once($connRoute);

$nome = htmlspecialchars($_POST['nome']);
$sobrenome = htmlspecialchars($_POST['sobrenome']);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
$senha = hash("sha512", htmlspecialchars($_POST['senha']));
$cpf = htmlspecialchars($_POST['cpf']);

$cpf = str_replace('.', '', $cpf);
$cpf = str_replace('-', '', $cpf);
$sep = str_split($cpf, 1);

$dig1 = $sep[9];
$dig2 = $sep[10];
$certo1 = false;
$certo2 = false;

$soma = 0;
$j = 10;
for ($i = 0; $i < count($sep) - 2; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

$vDig1 = 11 - $soma % 11;
if ($vDig1 > 9) {
    $vDig1 = 0;
}

if ($dig1 == $vDig1) {
    $certo1 = true;
}

$soma = 0;
$j = 11;
for ($i = 0; $i < count($sep) - 1; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

$vDig2 = 11 - $soma % 11;
if ($vDig2 > 9) {
    $vDig2 = 0;
}

if ($dig2 == $vDig2) {
    $certo2 = true;
}

if ($certo1 && $certo2) {
    $result_empresa = "INSERT INTO usuarios
    VALUES (default, '$cpf', '$nome', '$sobrenome','$login', '$senha', NOW(), 'Fun')";
    $resultado_empresa = mysqli_query($conn, $result_empresa);

    if (mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style= 'color:green;'>USUÁRIO CADASTRADO COM SUCESSO</p>";
        header("Location: ". $loginRoute);
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO FOI CADASTRADO</p>";
        header("Location: " . $cadFunRoute);
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO FOI CADASTRADO - CPF INVÁLIDO</p>";
    header("Location: " . $cadFunRoute);
}
