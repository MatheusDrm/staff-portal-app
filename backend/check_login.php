<?php
    session_start();
    header("Content-Type: application/json");
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Max-Age: 86400"); 

    $usuarioLogado = isset($_SESSION['usuario']) ? true : false;

    $response = ["usuarioLogado" => $usuarioLogado];
    
    echo json_encode($response);

?>