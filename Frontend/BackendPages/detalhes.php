<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $array = $_SESSION['array'];
        echo '
            <form action="' . $procDetalhesRoute . '" method="post">
            <input type="hidden" value=<?php echo $id ?> name="id">
            <input type="hidden" value=<?php echo $hhh ?> name="horasaida">
            <input type="hidden" value=<?php echo $valortotal ?> name="valor">
            <div>
                <label for="nome">NOME :</label>
                <p id="nome">
                    ' . $array['Nome'] . '
                </p>
    
                <label for="telefone">TELEFONE :</label>
                <p id="telefone">
                    ' . $array['Telefone'] . '
                </p>
    
                <label for="placa">PLACA :</label>
                <p id="placa">
                    ' . $array['Placa'] . '
                </p>
    
                <label for="data">DATA :</label>
                <p id="data">
                    ' . $array['Data'] . '
                </p>
    
                <label for="horaEntrada">HORÁRIO DE ENTRADA :</label>
                <p id="horaEntrada">
                    ' . $array['Horario_ent'] . '
                </p>
    
                <label for="horaSaida">HORÁRIO DE SAÍDA :</label>
                <p id="horaSaida">
                    ' . $hhh . '
                </p>
    
                <label for="valor">VALOR A PAGAR :</label>
                <p id="valor">
                    ' . $valortotal . '
                </p>
                <input type="submit" value="CONFIRMAR">
    
                <a href="$listaRoute">VOLTAR</a>
            </div>
    
        </form>';

    } else {
        header("Location: " . $loginRoute);
    }
    ?>


</body>

</html>
