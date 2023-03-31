<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Frontend/FrontendPages/cssModalSenha/modal.css">
    <link rel="stylesheet" href="cssBack/modalsenha.css">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include_once("../../rotas.php"); // Inclui o arquivo de rotas
    include_once($connRoute); // Inclui o arquivo de conexao
    

    // Verifica se o usuário logado é adm
    if ($_SESSION['tipo'] == "Adm") {
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        // começo da tela
        echo '
        <form action="' .$procCadFunRoute. '" method="POST">

            <fieldset>
                <legend>CPF</legend>
                <input type="text" name="cpf" autofocus required><br><br>
            </fieldset>

            <fieldset>
                <legend>NOME</legend>
                <input type="text" name="nome" required><br><br>
            </fieldset>

            <fieldset>
                <legend>SOBRENOME</legend>
                <input type="text" name="sobrenome" required><br><br>
            </fieldset>

            <fieldset>
                <legend>LOGIN</legend>
                <input type="text" name="login" required><br><br>
            </fieldset>

            <fieldset>
                <legend>SENHA</legend>
                <input type="password" name="senha" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$">
                <input type="button" value="?" class="info" id="info"></input>
            </fieldset>

            <!-- Botão de informação -->


            <div id="myModa" class="mod">

                <div class="modal-content">

                    <span class="clo">&times;</span>

                    <p class="pmodal">Requisitos: Tamanho de no mínimo 8 caracteres com 1 letra maiúscula, 1 letra minúscula, 1 número e um caracter especial.</p><br><br>

                    </div>


                </div>
                
            </div>
            <fieldset>
                <legend>CONFIRME A SENHA</legend>
                <input type="password" name="confsenha" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$"><br><br>
            </fieldset>

            <input type="submit" id="enviar" value="Enviar" disabled>
            <a href=' . $listaRoute . ' ?>VOLTAR</a>

        </form>
        
        <script src='. $confSenhaRoute.'></script>
        <script src='. $engineSenhaRoute.'></script>

        ';
        // fim da tela
    } else {

        header("Location: " . $listaRoute);

    }
    ?>

</body>

</html>
