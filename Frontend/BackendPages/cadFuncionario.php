<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    session_start();
    include_once("../../rotas.php");
    include_once($connRoute);
    ?>

    <form action="<?php echo $procCadFunRoute; ?>" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" autofocus required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" required><br><br>

        <label for="login">Login:</label>
        <input type="text" name="login" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha"><br><br>

        <label for="senha">Digite novamente a senha:</label>
        <input type="password" name="confsenha"><br><br>

        <input type="submit" id="enviar" value="Enviar" disabled>

        <script src="<?php echo $confSenhaRoute; ?>"></script>
    </form>
</body>

</html>
