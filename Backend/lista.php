<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIO</a>
    <a href="registro.php">NOVA ENTRADA</a>


    <?php
      session_start();
      include_once('conexao.php');

      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $resultado = mysqli_query($conn, "SELECT * FROM registros WHERE Horario_saida IS NULL");
        
        $rows = $resultado -> fetch_assoc();
        
        foreach ($rows as &$row) {
          print_r($row);
          // row[0] puxa o id
          echo "<a href='detalhes.php?id=$row[0]'>Detalhes</a><br>";
        }

      } else {
        echo "Por favor, faça o login primeiro.";
      }

    ?>

    
</body>
</html>