<?php
$host = "bancomayck2dt-server.mysql.database.azure.com";
$user = "pricjucmeq";
$pass = 'W5W5086C75UDOJ7K';
// $user = "teste";
// $pass = 'P4$sword';
$dbname = "bancomayck2dt-database";

// Criar a conexao com o Banco de Dados
try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (Exception $e) {
    // Handle exception
    echo 'Caught exception: ', $e->getMessage(), "<br>";
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
