<?php
session_start();
include_once("../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores do registro que está sendo fechado
$dados = $_SESSION['array'];
$id = $dados['PK_Registro'];
$hora_saida = date("H:i:s");
$value = $_SESSION['result'];

// Atualiza o registro no banco de dados
// com o horário de saída e o valor pago
$comando = "update registros set
    Horario_saida = '$hora_saida',Valor_vaga = '$vvaga',
    Valor_eletrico = '$vrec', Valor_pago = '$value'
    where PK_registro = '$id'";

mysqli_query($conn, $comando);

// Caso ocorra tudo certo, o usuário é enviado à páginda de lista;
if (mysqli_affected_rows($conn) > 0) {
    header("Location: " . $listaRoute);
} else {
    echo '<p>Fechamento de registro nâo efetuado</p>';
}
