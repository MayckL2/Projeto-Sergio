<?php

session_start();
include_once("../rotas.php");
include_once($connRoute);
date_default_timezone_set('America/Sao_Paulo');

$comando = 'select placa, Horario_ent, Recarregou_Carro from registros where Horario_saida is null;';

$resultado = mysqli_query($conn, $comando);
$ver = $resultado->fetch_all();

foreach ($ver as $registro) {
    // Pega a hora atual
    $hhh = date('H:i:s');
    $hora = date('H:i');

    // Converte a string hora e a string Horario_ent em um DateTime object
    $hh = new DateTime($hora);
    $hora_entrada = new DateTime($registro[1]);

    // Verifica a diferença de horário
    $diferenca = $hora_entrada->diff($hh);

    // Converte a diferença em horas e minutos em inteiro, separando em duas variáveis
    $gethora = intval($diferenca->format('%H'));
    $getminuto = intval($diferenca->format('%I'));

    if ($gethora == 0) {

        // se for igual a zero e os minutos menor que 16
        if ($getminuto < 16) {
            // o estacionamento será de graça
            $precovaga = 0;
        } elseif ($getminuto >= 16) {
            // se não for menor que 16, será 27 reais o valor
            $precovaga = 27;
        }

    } elseif ($gethora == 1) { // verifica se a hora é igual a 1

        // se for e os minutos forem 0
        if ($getminuto == 0) {
            // será cobrado 27 reais
            $precovaga = 27;
        } elseif ($getminuto >= 1) {
            // se for mais que 0 minutos será cobrado 32 reais
            $precovaga = 32;
        }

    } elseif ($gethora == 2 && $getminuto == 0) { // se for 2 horas e 0 minutos
        // será cobrado 32 reais
        $precovaga = 32;

    } elseif ($gethora >= 2 && $getminuto > 0) {
        // se for igual ou maior a 2 horas e mais de 0 minutos

        // será cobrado 32 + 9 * horas a mais de 2 horas
        $precovaga = 32 + ($gethora - 2) * 9;
    }

    if ($registro[2] == 1) {
        $precorecarga = ($gethora * 15) + ($getminuto * 0.25);
    } else {
        $precorecarga = 0;
    }

    $valortotal = $precovaga + $precorecarga;


    $_SESSION['precovaga'] = $precovaga;
    $_SESSION['precorecarga'] = $precorecarga;
    $_SESSION['total'] = $valortotal;


    $comando2 = "update registros set Horario_saida = '$hhh', Valor_vaga = '$precovaga',
    Valor_eletrico = '$precorecarga',  Valor_pago = '$valortotal' where placa = '$registro[0]';";
    $resultado = mysqli_query($conn, $comando2);
}

header("location: " . $listaRoute);
