<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Entrada</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
    <link rel="stylesheet" href="./cssBack/registro.css">
</head>

<body>
    <?php
    session_start();
    
    include_once("../../rotas.php"); // Inclui o arquivo de rotas
    include_once($connRoute); // Inclui o arquivo de conexao
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        if (isset($_SESSION['msgregistronao'])) {
            echo "<p>".$_SESSION['msgregistronao']."</p>";
            unset($_SESSION['msgregistronao']);
        }
        echo '
        <form action="' . $procRegistroRoute . '"method="POST">
            <h1>Nova Entrada</h1>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" autofocus required><br><br>

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone"
            pattern="(\(\d{2}\)|\d{2})?9\d{4}[-]?\d{4}" required><br><br>

            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" pattern="[A-Z]{3}\d[A-Z0-9]\d{2}"
            oninput="this.value = this.value.toUpperCase()" required><br>

            <p>Vai recarregar o carro?</p>
            <label for="sim">Sim</label>
            <input type="radio" name="recar" id="sim" value="1" required>
            <label for="nao">Não</label>
            <input type="radio" name="recar" id="nao" value="0"><br><br>

            <input type="submit" value="Enviar">
            <a href=' . $listaRoute . ' ?>Voltar</a>
        </form>';
    } else {
        header("Location: " . $loginRoute);
    }
    ?>


</body>

</html>
