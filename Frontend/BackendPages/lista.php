<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="cssBack/lista.css">
</head>

<body>
  <?php
  session_start();
  include_once("../../rotas.php");
  include_once($connRoute);

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "<div class='back'>";

    echo "<header>";
    echo "<img src='img/logo.png'>";
    // Caso o tipo do usuário fo Adm, mostrará o botão que leva a página de cadastro
    if ($_SESSION['tipo'] == 'Adm') {
      echo "<a href='$cadFunRoute'>CADASTRAR FUNCIONÁRIO</a>";
    }
    echo "<a href='$registroRoute'>NOVA ENTRADA</a>";
    echo "<a href='$procFechamentoRoute'>FECHAMENTO</a>";
    echo "<a href='$historicoRoute'>HISTÓRICO</a>";
    echo "<a href='$procLogoffRoute'>SAIR</a><br>";

    echo "</header>";

    echo "
    <form action='$listaRoute' method='get'>
      <input type='text' placeholder='pesquise por placas' name='pesq'>
      <input type='submit' value='pesquisar'>
    </form>
    ";

    echo "</div>";

    if (isset($_GET['pesq'])) {
      $pesq = $_GET['pesq'];
    } else {
      $pesq = "";
    }

    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    // Setar a quantidade de items por pagina
    $qnt_result_pg = 9;

    // Calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    // Faz uma query para retornar todos os registros que não foram fechados
    $resultado = mysqli_query($conn, "SELECT * FROM registros
    WHERE Horario_saida IS NULL AND Placa like '%$pesq%'
    LIMIT $inicio, $qnt_result_pg");

    // Retorna todos os registros coletados na query, e adicionar no array rows
    $rows = $resultado->fetch_all();

    echo "<div class='cards'>";

    // Para cada index no array rows, cria um "card"
    foreach ($rows as $row) {
      echo "
          <div>

            <fieldset>
            <legend>Nome</legend>
            <p>$row[2]</p>
            </fieldset>
          
            <fieldset>
            <legend>Horário de saida</legend>
            <p>$row[6]</p>
            </fieldset>
          
            <fieldset>
            <legend>Placa</legend>
            <p>$row[4]</p>
            </fieldset>

            <a href='$procCalculoRoute?id=$row[0]'>Detalhes</a><br>
          </div>
          ";
    }
    echo "</div>";
    echo "<br>";

    // Paginação - Somar a quantidade de usuários
    $resultado_pg = mysqli_query($conn, "SELECT COUNT(PK_Registro) 
    AS num_result FROM registros WHERE Horario_saida IS NULL");
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    // echo $row_pg['num_result'];

    // Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    // Limitar os link antes depois
    $max_links = 2;
    echo "<div class='pags'>";

    echo "<a href='$listaRoute?pagina=1'>Primeira</a> ";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
      if ($pag_ant >= 1) {
        echo "<a href='$listaRoute?pagina=$pag_ant'>$pag_ant</a> ";
      }
    }

    echo $pagina;

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
      if ($pag_dep <= $quantidade_pg) {
        echo "<a href='$listaRoute?pagina=$pag_dep'>$pag_dep</a> ";
      }
    }

    echo " <a href='$listaRoute?pagina=$quantidade_pg'>Ultima</a>";
 
    echo "</div>";

  } else {
    echo "Por favor, faça o login primeiro.";
    header("Location: " . $loginRoute);
  } ?>

</body>

</html>