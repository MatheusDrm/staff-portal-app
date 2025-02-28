<?php
    session_start();
    session_unset();
    session_destroy(); // Destroi a sessão


    // Retorna JSON indicando que o logout foi bem-sucedido
    header("Content-Type: application/json");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Max-Age: 86400"); 
    
    echo json_encode(["success" => true, "message" => "Logout realizado com sucesso"]);
    exit();
?>
