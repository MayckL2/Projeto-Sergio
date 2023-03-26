<?php
session_start();
include_once("../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$login = htmlspecialchars($_POST['login']);
$senha = htmlspecialchars($_POST['senha']);
// Codifica a senha, para que possa ser comparada com a senha do banco
$hash = hash("sha512", $senha);

try {
    // Faz a query no banco, utilizando a senha e o login, fornecidos pelo usuário
    $resultado = mysqli_query($conn, "SELECT Login, Senha, PK_Usuario, Tipo FROM usuarios
    WHERE Login = '$login' and Senha = '$hash'");

    // Verifica se a query deu algum retorno
    if ($row = $resultado->fetch_row()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row[2]; // $username coming from the form, such as $_POST['username']
        $_SESSION['tipo'] = $row[3];
        header("Location: " . $listaRoute);
    } else {
        echo "Login não efetuado.";
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
