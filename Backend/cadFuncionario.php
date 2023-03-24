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
    ?>

    <form action="proc_cadFuncionario.php" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf"><br><br>
      
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br><br>
      
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome"><br><br>
      
        <label for="login">Login:</label>
        <input type="text" name="login"><br><br>
      
        <label for="senha">Senha:</label>
        <input type="password" name="senha"><br><br>
      
        <input type="submit" value="Enviar">
      </form>      
</body>
</html>