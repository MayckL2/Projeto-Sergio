<?php
    session_start();
    include_once("../rotas.php");


    unset($_SESSION['loggedin'] );
    unset($_SESSION['id']); 
    unset($_SESSION['tipo']);

    header("Location:" . $loginRoute);


?>