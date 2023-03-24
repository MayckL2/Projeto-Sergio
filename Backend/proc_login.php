<?php
    session_start();
    include_once('conexao.php');

    $login = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['senha']);
    $hash = hash("sha512", $senha);

    try {
        $resultado = mysqli_query($conn, "SELECT Login, Senha FROM usuarios WHERE Login = '$login' and Senha = '$hash'");
    

        if (mysqli_num_rows($resultado) > 0){
            $_SESSION['loggedin'] = true;
            $_SESSION['login'] = $login; // $username coming from the form, such as $_POST['username']
            header("Location: hello.php");
        }

        
    } catch (Exception $e) {
        echo $e -> getMessage();
    }

    





?>