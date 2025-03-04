<?php
    session_start();
    session_unset();
    session_destroy(); // Destroi a sessão


    // Retorna JSON indicando que o logout foi bem-sucedido
    header("Content-Type: application/json");

    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permite chamadas do frontend
    header("Access-Control-Allow-Credentials: true"); // Permite envio de cookies (sessão)
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    
    echo json_encode(["success" => true, "message" => "Logout realizado com sucesso"]);
    exit();
?>
