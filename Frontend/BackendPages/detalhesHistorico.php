<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes Histórico</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">

</head>

<body>
    <?php
    session_start();
    include_once("../../rotas.php");
    date_default_timezone_set('America/Sao_Paulo'); // Define o timezone para São Paulo
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $array = $_SESSION['array'];
        $hhh = date("H:i:s");
        $valortotal = $_SESSION['result'];

        echo '
        
            <div>
                <label for="nome">NOME :</label>
                <p id="nome">
                    ' . $array['Nome'] . '
                </p>
    
                <label for="telefone">TELEFONE :</label>
                <p id="telefone">
                    ' . $array['Telefone'] . '
                </p>
    
                <label for="placa">PLACA :</label>
                <p id="placa">
                    ' . $array['Placa'] . '
                </p>
    
                <label for="data">DATA :</label>
                <p id="data">
                    ' . $array['Data'] . '
                </p>
    
                <label for="horaEntrada">HORÁRIO DE ENTRADA :</label>
                <p id="horaEntrada">
                    ' . $array['Horario_ent'] . '
                </p>
    
                <label for="horaSaida">HORÁRIO DE SAÍDA :</label>
                <p id="horaSaida">
                    ' . $hhh . '
                </p>
    
                <label for="valor">VALOR A PAGAR :</label>
                <p id="valor">
                    ' . $valortotal . '
                </p>
    
                <a href= ' . $historicoRoute . '>VOLTAR</a>
            </div>
    
        ';

    } else {
        header("Location: " . $loginRoute);
    }
    ?>


</body>

</html>
