<?php
  include_once("rotas.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Hudson</title>
    <link rel="icon" href="Frontend/img/Capturar-removebg-preview 1.png">
    <link rel="stylesheet" href="Frontend/header.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/home.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/marketing.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/blog.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/localiza.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/instituicao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
</head>
<body onresize="checaDispositivo()" onload="checaDispositivo()" onscroll="escondeHeader()">
  
    <a href="#topo" class="setaTopo">
      <img src="Frontend/img/right-arrow.png" alt="seta">
    </a>

    <header>
        <a href="" class="logo">
            <img src="Frontend/img/Capturar-removebg-preview 1.png" alt="logoEmpresa">
        </a>

        <img onclick="chamaMenu()" src="Frontend/img/menu-suspenso.png" class="menu" alt="menu">

        <ul class="retratil">
            <li class="menuItens">Mapa de localização</li>
            <li class="menuItens">Blog</li>
            <li class="menuItens">Institucional</li>
            <li class="menuItens">Contato</li>
            <li><a href="<?php echo $loginRoute; ?>">Login</a></li>
        </ul>
    </header>

    <section class="home" id="topo">
        <div class="box">
            <div>
                <h1>CONHEÇA NOSSA ESTRUTURA</h1>
                <p>São Paulo - Capital</p>
                <a href="">Veja</a>
            </div>
        </div>
    </section>

    <section class="container row mark">
      
      <div class="col-md">
        <img src="Frontend/img/ciber-seguranca 1.png" alt="segurança">
        <h2>Segurança</h2>
        <p>Mantemos seu carro segura enquanto você precisar</p>
      </div>
      
      <div class="col-md">
        <img src="Frontend/img/localizacao 1.png" class="maior" alt="localizacao">
        <h2>Localização</h2>
        <p>localização próxima ao seus objetivos</p>
      </div>
      
      <div class="col-md">
        <img src="Frontend/img/transferencia-movel 1.png" alt="preço">
        <h2>Preço</h2>
        <p>Preços acessiveis e justos para toda a população</p>
      </div>

    </section>

    <section class="container-fluid row map">
      <div class="col-md centraGrid">
        <div class="gridMap">
          <img src="Frontend/img/localizacao 2.png" id="item1" alt="seta">
          <img src="Frontend/img/Rectangle 59.png" id="item2" alt="cidade">
          <img src="Frontend/img/Rectangle 61.png" id="item3" alt="cidade2">
        </div>
      </div>

      <div class="col-md descMap">
        <h2>MAPA DE LOCALIZAÇÃO NA CIDADE DE SÃO PAULO</h2>
        <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os</p>
        <a href="">MAPA</a>
      </div>
    </section>

    <section class="container-fluid row blog">
      <div class="col-md carImg">
        <div></div>
        <img src="Frontend/img/image-removebg-preview 1.png" alt="carro">
      </div>

      <div class="col-md descBlog">
        <h2>CONHEÇA NOSSO BLOG</h2>
        <p>Este é o nosso espaço com dicas, notícias, novidades e informações úteis sobre
          os principais eventos que contam com nossos estacionamentos, mobilidade urbana, e mais!</p>
        <a href="">Saiba mais</a>
      </div>

      <!-- <div class="col-md barra">
        <div></div>
      </div> -->
    </section>

    <section class="container-fluid row inst m-0">
      <div>
        <h2>SOBRE A DOC HUDSON</h2>
        <p>Buscamos através da inovação tecnologica a maior segurança e comobidade para o seu carro
          em uma localização coringa para o dia a dia em São Paulo</p>
        <a href="">Saiba Mais</a>
      </div>
    </section>

    <script src="Frontend/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>
