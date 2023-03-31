<?php
    session_start();
    include_once("../../rotas.php"); // Inclui o arquivo de rotas
    include_once($connRoute); // Inclui o arquivo de conexao
    date_default_timezone_set('America/Sao_Paulo'); // Define o timezone para São Paulo

    $tes = 'AQS1234';
    $comando2 = 'select Placa from registros where Horario_saida is null;';
    $re = mysqli_query($conn, $comando2);

    $existe = 0;

    $pla = $re -> fetch_all();

    foreach ($pla as $placa){
        if ($placa[0] == $tes){
            $existe = 1;
        }
    }

    if ($existe == 0){
        echo 'nada aqui otario, meu deus';
    } else {
        echo 'Algo errado aqui, soldado';
    }
    

?>