<?php
session_start();
include_once("../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao
date_default_timezone_set('America/Sao_Paulo'); // Define o timezone para São Paulo


// Pega os inputs do form
$nome = htmlspecialchars($_POST['nome']);
$telefone = htmlspecialchars($_POST['telefone']);
$placa = htmlspecialchars($_POST['placa']);
$recarga = htmlspecialchars($_POST['recar']);
$replaceTel = ['(', ')', '-'];
$telefone = str_replace($replaceTel, '', $telefone); // Remove os parenteses e hifen do telefone
echo $_SESSION['id'];   
// Pega a data de hoje e o horário atual
$hoje = date('Y-m-d');
$hora = date('H:i:s');

$comando2 = 'select placa from registros where Horario_saida is null;';
$re = mysqli_query($conn, $comando2);

$pla = $re -> fetch_all();

$existe = 0;

foreach ($pla as $placaa){
    if ($placaa[0] == $placa){
        $existe = 1;
    }
}


if ($existe == 0){
    // Insere o registro da nova entrada
    $result_empresa = "INSERT INTO registros
    (PK_Registro, FK_Usuario, Nome, Telefone, Placa, Data, Horario_ent, Recarregou_Carro)
    VALUES (default, '" . $_SESSION['id'] . "' , '$nome', '$telefone', '$placa', '$hoje', '$hora', '$recarga')";
    // executa a inserção do registro
    $resultado_empresa = mysqli_query($conn, $result_empresa);

    // Verifica se a execução ocorreu corretamente
    if (mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style= 'color:green;'>Registro realizado com sucesso</p>";
        // se sim o usuário irá pra pagina lista
        header("Location: ". $listaRoute);
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Registro não foi realizado</p>";
        // Se não volta pro registro
        header("Location: " . $registroRoute);
    }
} else {
    $_SESSION['msg'] = "<p style = 'color: red';>Placa já está cadastrada e não possui um fechamento ainda<p>";
    header("Location: " . $registroRoute);
}
