<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carros cadastrados</title>
  
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">

  
  
  
  <link rel="stylesheet" href="cssBack/modalfechamento.css">
  <link rel="stylesheet" href="cssBack/lista.css">

</head>

<body onresize="checaDispositivo()" onload="checaDispositivo()">
  <?php
  session_start();
  include_once("../../rotas.php");
  include_once($connRoute);

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

    

    echo "
      <header>

      <a href='' class='logo'>
      <img src='img/logo.png' alt='logoEmpresa'>
      </a>

      <img onclick='chamaMenu()' src='../FrontendPages/img/menu-suspenso.png' class='menu' alt='menu'>
      
      <div class='botoesHeader retratil'>
    
    ";

    

    // Caso o tipo do usuário for Adm, mostrará o botão que leva a página de cadastro
    if ($_SESSION['tipo'] == 'Adm') {
      echo "<a href='$cadFunRoute'>Cadastrar Funcionários</a>";
    }

    echo "
      <a href='$registroRoute'>Nova Entrada</a>
      <a id='meuBota'>Fechamento</a>
      <a href='$historicoRoute'>Histórico</a>
      <a href='$procLogoffRoute'>Sair</a><br>

      <form action='$listaRoute' method='get'>
      <input type='text' placeholder='Pesquise por placas:' name='pesq'><input type='submit' value='Pesquisar'>
      </form>
      </div>
     
      </header>
      
      <h1>Lista de carros cadastrados no estacionamento</h1>
      
     
    ";

    if (isset($_SESSION['msgregistrosim'])) {
      echo "<span>".$_SESSION['msgregistrosim']."</span>";
      unset($_SESSION['msgregistrosim']);
    }

    if (isset($_GET['pesq'])) {
      $pesq = $_GET['pesq'];
    } else {
      $pesq = "";
    }

    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    // Setar a quantidade de items por pagina
    $qnt_result_pg = 6;

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
    echo "</div><br>";

    // Paginação - Somar a quantidade de usuários
    $resultado_pg = mysqli_query($conn, "SELECT COUNT(PK_Registro) 
    AS num_result FROM registros WHERE Horario_saida IS NULL");
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    // echo $row_pg['num_result'];

    // Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    // Limitar os link antes depois
    $max_links = 2;
    echo "
    <div class='pags'>
    <a href='$listaRoute?pagina=1'>Primeira</a>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
      if ($pag_ant >= 1) {
        echo "<a href='$listaRoute?pagina=$pag_ant'>$pag_ant</a>";
      }
    }

    echo $pagina;

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
      if ($pag_dep <= $quantidade_pg) {
        echo "<a href='$listaRoute?pagina=$pag_dep'>$pag_dep</a>";
      }
    }

    echo "
    <a href='$listaRoute?pagina=$quantidade_pg'>Ultima</a>
    </div>";

  } else {
    echo "Por favor, faça o login primeiro.";
    header("Location: " . $loginRoute);
  } ?>


<div id="myModa" class="moda">

  <div class="modal-content">

    <span class="clos">&times;</span>

    <p class="pmodal">Tem certeza que quer realizar o fechamento de todos os carros?</p><br><br>

    <div class="botoes">
      <a href=<?php echo $procFechamentoRoute; ?> class="simBtn">SIM</a>
  
      <a href=<?php echo $listaRoute ?> class="naoBtn">NÃO</a>

    </div>


  </div>
  
</div>


<script>

  let menu = document.querySelector(".menu");

  let retratil = document.querySelector(".retratil");

  // exibe menu no mobile
  function chamaMenu(){
      if(retratil.style.right == '-1300px'){

        menu.style.rotate= '90deg'
        retratil.style.right= '0px'

      }else{

        menu.style.rotate= '0deg'
        retratil.style.right = '-1300px'
        
      }
  }



</script>

<script src="enginefechamento.js"></script>




</body>

</html>