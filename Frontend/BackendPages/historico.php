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
  include_once("../../rotas.php"); // Inclui o arquivo de rotas
  include_once($connRoute); // Inclui o arquivo de conexao
  
  // Verifica se o usuário está logado
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    // Caso o tipo do usuário fo Adm, mostrará o botão que leva a página de cadastro
    if ($_SESSION['tipo'] == 'Adm') {
      echo "<a href='$cadFunRoute'>CADASTRAR FUNCIONÁRIO <br></a>";
    }
    echo "<a href='$registroRoute'>NOVA ENTRADA</a><br>";
    echo "<a href='$listaRoute'>ENTRADAS</a>";

    // Faz uma query para retornar todos os registros que não foram fechados
    $resultado = mysqli_query($conn, "SELECT * FROM registros WHERE Horario_saida IS NOT NULL");

    // Retorna todos os registros coletados na query, e adicionar no array rows
    $rows = $resultado->fetch_all();

    // Para cada index no array rows, cria um "card"
    foreach ($rows as $row) {
      echo "
          <div>
            <p>Nome: $row[2]</p>
            <p>Horário de entrada: $row[7]</p>
            <p>Placa: $row[4]</p>
            <p>Valor Pago: $row[8]</p>
            <!-- row[0] puxa o id -->
            <a href='$detalhesRoute?id=$row[0]'>Detalhes</a><br>
            <hr>
          </div>
          ";
    }

  } else {
    echo "Por favor, faça o login primeiro.";
    header("Location: " . $loginRoute);

  }?>

</body>

</html>
