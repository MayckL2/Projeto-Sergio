<?php
session_start();
include_once("../../rotas.php");
include_once($connRoute);
date_default_timezone_set('America/Sao_Paulo');

$id = $_GET['id'];

$comando = "select * from registros where PK_registro = '$id'";
$resultado = mysqli_query($conn, $comando);

$array = mysqli_fetch_assoc($resultado);
// retorna Array ( [PK_Registro] => 4 [FK_Usuario] => 1 [Nome] => michael [Telefone] => 11978969547 [Placa] => acs2134 [Data] => 2023-03-24 [Horario_ent] => 15:01:21 [Horario_saida] => [Valor_pago] => )

$hhh = date('H:i:s');
$hora = date('H:i');
$hh = new DateTime($hora);
$horario1 = new DateTime($array['Horario_ent']);

$diferenca = $horario1->diff($hh);

$gethora = intval($diferenca->format('%H'));
$getminuto = intval($diferenca->format('%I'));

//funfou

// if (($gethora == 0 && $getminuto >= 16) || ($gethora == 1 && $getminuto == 0)){
//     $valortotal = 27;
// } elseif (($gethora == 1 && $getminuto >= 1) || ($gethora == 2 && $getminuto == 0)){
//     $valortotal = 32;
// } else {
//     if($getminuto > 0) {
//         $gethora += 1;
//     }
//     $valortotal = 32 + ($gethora - 2) * 9;
// }

if ($gethora == 0) {

    if ($getminuto < 16) {
        $valortotal = 0;
    } elseif ($getminuto >= 16) {
        $valortotal = 27;
    }

} elseif ($gethora == 1) {

    if ($getminuto == 0) {
        $valortotal = 27;
    } elseif ($getminuto >= 1) {
        $valortotal = 32;
    }

} elseif ($gethora == 2 && $getminuto == 0) {

    $valortotal = 32;

} elseif ($gethora >= 2 && $getminuto > 0) {

    $valortotal = 32 + ($gethora - 2) * 9;
}


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

    <form action="<?php echo $procDetalhesRoute;?>" method="post">
        <input type="hidden" value=<?php echo $id ?> name="id">
        <input type="hidden" value=<?php echo $hhh ?> name="horasaida">
        <input type="hidden" value=<?php echo $valortotal ?> name="valor">
        <div>
            <label for="nome">NOME :</label>
            <p id="nome">
                <?php echo $array['Nome']; ?>
            </p>

            <label for="telefone">TELEFONE :</label>
            <p id="telefone">
                <?php echo $array['Telefone']; ?>
            </p>

            <label for="placa">PLACA :</label>
            <p id="placa">
                <?php echo $array['Placa']; ?>
            </p>

            <label for="data">DATA :</label>
            <p id="data">
                <?php echo $array['Data']; ?>
            </p>

            <label for="horaEntrada">HORÁRIO DE ENTRADA :</label>
            <p id="horaEntrada">
                <?php echo $array['Horario_ent']; ?>
            </p>

            <label for="horaSaida">HORÁRIO DE SAÍDA :</label>
            <p id="horaSaida">
                <?php echo $hhh; ?>
            </p>

            <label for="valor">VALOR A PAGAR :</label>
            <p id="valor">
                <?php echo $valortotal; ?>
            </p>
            <input type="submit" value="CONFIRMAR">

            <a href="lista.php">VOLTAR</a>
        </div>

    </form>
</body>

</html>
