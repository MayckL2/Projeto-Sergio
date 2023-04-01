<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
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
        $precovaga = $_SESSION['precovaga'];
        $precorecarga =$_SESSION['precorecarga'];
        $valortotal = $_SESSION['total'];
        $data = new DateTime($array['Data']);


        echo '
            <form action="' . $procDetalhesRoute . '" method="post">
        
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
                    ' . $data -> format("d-m-Y") . '
                </p>
    
                <label for="horaEntrada">HORÁRIO DE ENTRADA :</label>
                <p id="horaEntrada">
                    ' . $array['Horario_ent'] . '
                </p>
    
                <label for="horaSaida">HORÁRIO DE SAÍDA :</label>
                <p id="horaSaida">
                    ' . $hhh . '
                </p>
    
                <label for="valorvaga">VALOR DA VAGA :</label>
                <p id="valorvaga">
                    ' . $precovaga . '
                </p>

                <label for="valorrecarga">VALOR DA RECARGA :</label>
                <p id="valorrecarga">
                    ' . $precorecarga . '
                </p>

                <label for="total">VALOR TOTAL:</label>
                <p id="total">
                    ' . $valortotal . '
                </p>

                <input type="submit" value="CONFIRMAR">
    
                <a href= ' . $listaRoute . '>VOLTAR</a>
            </div>
    
        </form>';

    } else {
        header("Location: " . $loginRoute);
    }
    ?>


</body>

</html>
