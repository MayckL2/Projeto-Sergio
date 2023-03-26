<?php
session_start();
include_once("../rotas.php");
include_once($connRoute);

$login = htmlspecialchars($_POST['login']);
$senha = htmlspecialchars($_POST['senha']);
$hash = hash("sha512", $senha);

try {
    $resultado = mysqli_query($conn, "SELECT Login, Senha, PK_Usuario FROM usuarios
    WHERE Login = '$login' and Senha = '$hash'");


    if ($row = $resultado->fetch_row()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row[2]; // $username coming from the form, such as $_POST['username']
        header("Location: " . $listaRoute);
    } else {
        echo "Login não efetuado.";
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
