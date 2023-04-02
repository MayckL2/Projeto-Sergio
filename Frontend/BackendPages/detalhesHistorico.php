<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes Histórico</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
    <link rel="stylesheet" href="./cssBack/detalhes.css">

</head>

<body>
    <?php
    session_start();
    include_once("../../rotas.php");
    include_once($connRoute);
    date_default_timezone_set('America/Sao_Paulo'); // Define o timezone para São Paulo
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $id = $_GET['id'];

        $comando = "select * from registros where PK_Registro = '$id';";
        $resultado = mysqli_query($conn, $comando);
        $array = $resultado->fetch_assoc();

        $precovaga = $_SESSION['precovaga'];
        $precorecarga =$_SESSION['precorecarga'];
        $valortotal = $_SESSION['total'];
        $data = new DateTime($array['Data']);

        echo '
                <form>
                <div>
                    <label for="nome">NOME :</label>
                    <p id="nome">
                        ' . $array['Nome'] . '
                    </p>
                </div>

                <br>

                <div>
                    <label for="telefone">TELEFONE :</label>
                    <p id="telefone">
                        ' . $array['Telefone'] . '
                    </p>
                </div>
                <br>

                <div>
                    <label for="placa">PLACA :</label>
                    <p id="placa">
                        ' . $array['Placa'] . '
                    </p>
                </div>
                <br>

                <div>
        
                    <label for="data">DATA :</label>
                    <p id="data">
                        ' . $data -> format("d / m / Y") . '
                    </p>
                </div>
                <br>

                <div>
                    <label for="horaEntrada">HORÁRIO DE ENTRADA :</label>
                    <p id="horaEntrada">
                        ' . $array['Horario_ent'] . '
                    </p>
                </div>
                <br>

                <div>
                    <label for="horaSaida">HORÁRIO DE SAÍDA :</label>
                    <p id="horaSaida">
                        ' . $array['Horario_saida'] . '
                    </p>
                </div>

                <br>
    
                <div>
                    <label for="valorvaga">VALOR DA VAGA :</label>
                    <p id="valorvaga">
                        R$ ' . $precovaga . '
                    </p>
                </div>
    
                <br>
    
                <div>
                    <label for="valorrecarga">VALOR DA RECARGA :</label>
                    <p id="valorrecarga">
                        R$ ' . $precorecarga . '
                    </p>
                </div>
    
                <br>
    
                <div>
                    <label for="total">VALOR TOTAL:</label>
                    <p id="total">
                        R$ ' . $valortotal . '
                    </p>
                </div>
                <br>
                <a href= ' . $historicoRoute . '>VOLTAR</a>

                </form>';

    } else {
        header("Location: " . $loginRoute);
    }
    ?>


</body>

</html>
