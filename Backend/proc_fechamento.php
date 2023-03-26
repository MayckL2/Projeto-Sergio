<?php

    session_start();
    include_once("../rotas.php");
    include_once($connRoute);
    date_default_timezone_set('America/Sao_Paulo');

    $comando =  'select placa, Horario_ent from registros where Horario_saida is null;';

    $resultado = mysqli_query($conn, $comando);
    $ver  = $resultado -> fetch_all();

    foreach ($ver as $placa){

        echo $placa[1]. "<br>";


    }


?>