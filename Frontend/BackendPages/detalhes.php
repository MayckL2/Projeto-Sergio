<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao
date_default_timezone_set('America/Sao_Paulo'); // Define o timezone para São Paulo

// Pega o valor do id que vem da lista
$id = $_GET['id'];

// Puxa os dados do registro, de acordo com o id
$comando = "select * from registros where PK_registro = '$id'";
$resultado = mysqli_query($conn, $comando);

$array = mysqli_fetch_assoc($resultado);
// retorna Array ( [PK_Registro] => 4 [FK_Usuario] => 1 [Nome] => michael [Telefone] => 11978969547 [Placa] => acs2134 [Data] => 2023-03-24 [Horario_ent] => 15:01:21 [Horario_saida] => [Valor_pago] => )

// Pega a hora atual
$hhh = date('H:i:s');
$hora = date('H:i');

// Converte a string hora e a string Horario_ent em um DateTime object
$hh = new DateTime($hora);
$horario1 = new DateTime($array['Horario_ent']);

// Verifica a diferença de horário
$diferenca = $horario1->diff($hh);

// Converte a diferença em horas e minutos em inteiro, separando em duas variáveis
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

// Verifica se a hora é igual a zero
if ($gethora == 0) {

    // se for igual a zero e os minutos menor que 16
    if ($getminuto < 16) {
        // o estacionamento será de graça
        $valortotal = 0;
    } elseif ($getminuto >= 16) {
        // se não for menor que 16, será 27 reais o valor
        $valortotal = 27;
    }

} elseif ($gethora == 1) { // verifica se a hora é igual a 1

    // se for e os minutos forem 0
    if ($getminuto == 0) {
        // será cobrado 27 reais
        $valortotal = 27;
    } elseif ($getminuto >= 1) {
        // se for mais que 0 minutos será cobrado 32 reais
        $valortotal = 32;
    }

} elseif ($gethora == 2 && $getminuto == 0) { // se for 2 horas e 0 minutos
    // será cobrado 32 reais
    $valortotal = 32;

} elseif ($gethora >= 2 && $getminuto > 0) {
    // se for igual ou maior a 2 horas e mais de 0 minutos

    // será cobrado 32 + 9 * horas a mais de 2 horas
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

    <form action="<?php echo $procDetalhesRoute; ?>" method="post">
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
                <?php echo $hora; ?>
            </p>

            <label for="valor">VALOR A PAGAR :</label>
            <p id="valor">
                <?php echo $valortotal; ?>
            </p>
            <input type="submit" value="CONFIRMAR">

            <a href="<?php echo $listaRoute; ?>">VOLTAR</a>
        </div>

    </form>
</body>

</html>
