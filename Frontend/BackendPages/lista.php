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
  include_once("../../rotas.php");
  include_once($connRoute);
  if ($_SESSION['tipo'] == 'Adm') {
    echo "<a href='$cadFunRoute'>CADASTRAR FUNCIONÁRIO <br></a>";
  }
  echo "<a href='$registroRoute'>NOVA ENTRADA</a>";
  echo "<a href='$procFechamentoRoute'>FECHAMENTO</a>";


  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $resultado = mysqli_query($conn, "SELECT * FROM registros WHERE Horario_saida IS NULL");

    $rows = $resultado->fetch_all();

    foreach ($rows as $row) {
      echo "
          <div>
            <p>Nome: $row[2]</p>
            <p>Horário de entrada: $row[6]</p>
            <p>Placa: $row[4]</p>
            <!-- row[0] puxa o id -->
            <a href='$detalhesRoute?id=$row[0]'>Detalhes</a><br>
            <hr>
          </div>
          ";
    }

  } else {
    echo "Por favor, faça o login primeiro.";
  }

  ?>


</body>

</html>
