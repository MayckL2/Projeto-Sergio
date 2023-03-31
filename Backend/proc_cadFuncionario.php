<?php
session_start(); // Iniciar a sessão para poder pegar os valores do outro arquivo
include_once("../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores do form
$nome = htmlspecialchars($_POST['nome']);
$sobrenome = htmlspecialchars($_POST['sobrenome']);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
$senha = hash("sha512", htmlspecialchars($_POST['senha']));
$cpf = htmlspecialchars($_POST['cpf']);

// Remove os pontos e hífens do cpf
$cpf = str_replace('.', '', $cpf);
$cpf = str_replace('-', '', $cpf);
// Tranforma a string do cpf em um array
$sep = str_split($cpf, 1);

// Pega os dois últimos valores, que são os dígitos,
// e armazena em duas variáveis
$dig1 = $sep[9];
$dig2 = $sep[10];
$certo1 = false;
$certo2 = false;

// Realiza o calculo utilizando os 9 primeiros valores e os pesos equivalentes
$soma = 0;
$j = 10;
for ($i = 0; $i < count($sep) - 2; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

// Calcula o valor do digito, e verifica se ele é maior que 9,
// que serão substituidos por 0
$vDig1 = 11 - $soma % 11;
if ($vDig1 > 9) {
    $vDig1 = 0;
}

// Verifica se o digito calculado é igual ao digitado
if ($dig1 == $vDig1) {
    $certo1 = true;
}

// Realiza o calculo utilizando os 10 primeiros valores e os pesos equivalentes
$soma = 0;
$j = 11;
for ($i = 0; $i < count($sep) - 1; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

// Calcula o valor do digito, e verifica se ele é maior que 9,
// que serão substituidos por 0
$vDig2 = 11 - $soma % 11;
if ($vDig2 > 9) {
    $vDig2 = 0;
}

// Verifica se o digito calculado é igual ao digitado
if ($dig2 == $vDig2) {
    $certo2 = true;
}

$comando = 'select Login from usuarios;';
$result = mysqli_query($conn, $comando);

$nlogin = $result -> fetch_all();

$ext = 0;

foreach ($nlogin as $nick){
    if ($login == $nick){
        $ext = 1;
    }
}


// Se ambos digitos estiverem corretos
if ($certo1 && $certo2 && $ext == 0) {
    // Será feito a inserção do novo usuário no banco
    $result_empresa = "INSERT INTO usuarios
    VALUES (default, '$cpf', '$nome', '$sobrenome','$login', '$senha', NOW(), 'Fun')";
    $resultado_empresa = mysqli_query($conn, $result_empresa);

    // Se a inserção ocorre normalmente, o usuário é enviado para a página de login
    if (mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style= 'color:green;'>USUÁRIO CADASTRADO COM SUCESSO</p>";
        header("Location: ". $loginRoute);
    } else {
        // Senão, o usuário voltará pra página de cadastro
        $_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO FOI CADASTRADO</p>";
        header("Location: " . $cadFunRoute);
    }
} else {
    // Se o cpf estiver errado o usuário voltará pra página de cadastro.
    $_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO FOI CADASTRADO - CPF INVÁLIDO</p>";
    header("Location: " . $cadFunRoute);
}
echo '';