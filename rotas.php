<?php
$root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Projeto-Sergio-Eletrico-" . "/";
// $root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/";
$rootBack = $root . "Backend/";
$rootFront = $root . "Frontend/";
$rootBackPages = $rootFront . "BackendPages/";
$connRoute = $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Sergio-Eletrico-/Backend/conexao.php';
// $connRoute = $_SERVER['DOCUMENT_ROOT'] . '/Backend/conexao.php';


$loginRoute = $rootBackPages . "login.php";
$listaRoute = $rootBackPages . "lista.php";
$cadFunRoute = $rootBackPages . "cadFuncionario.php";
$registroRoute = $rootBackPages . "registro.php";
$detalhesRoute = $rootBackPages . "detalhes.php";
$detalhesHistoricoRoute = $rootBackPages . "detalhesHistorico.php";
$historicoRoute = $rootBackPages . "historico.php";

$homeRoute = $root . "index.php";

$procLoginRoute = $rootBack . "proc_login.php";
$procCadFunRoute = $rootBack . "proc_cadFuncionario.php";
$procRegistroRoute = $rootBack . "proc_registro.php";
$procDetalhesRoute = $rootBack . "proc_detalhe.php";
$procFechamentoRoute = $rootBack . "proc_fechamento.php";
$procLogoffRoute = $rootBack . "proc_logoff.php";
$procCalculoRoute = $rootBack . "proc_calculo.php";

$confSenhaRoute = $rootBack . "confsenha.js";
$modalInfRoute = $rootBack . "modalInf.js";
$engineSenhaRoute = $rootBack . "enginesenha.js";
