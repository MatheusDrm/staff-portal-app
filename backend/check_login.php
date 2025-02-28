<?php
    session_start();
    header("Content-Type: application/json");

    $usuarioLogado = isset($_SESSION['usuario']) ? true : false;

    $response = ["usuarioLogado" => $usuarioLogado];
    
    echo json_encode($response);

?>