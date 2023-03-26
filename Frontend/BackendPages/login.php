<?php
include_once("../../rotas.php");
include_once($connRoute);
session_start();
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="<?php echo $procLoginRoute; ?>" method="post">


        <label for="login">LOGIN: </label>
        <input type="text" name="login" placeholder="Digite seu nome de login">

        <label for="senha">SENHA: </label>
        <input type="password" name="senha" placeholder="Digite sua senha"> <br><br>


        <input type="submit" value="ENTRAR">
        <input type="reset" value="LIMPAR CAMPOS">


    </form>

</body>

</html>
