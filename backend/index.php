
<?php
    session_start();

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permitir chamadas do frontend
    // header("Access-Control-Allow-Origin: http://frontend:80"); // Permitir chamadas do frontend no Docker
    // header('Access-Control-Allow-Origin', '*');
    // header('Access-Control-Allow-Methods', '*');
    // header('Access-Control-Allow-Headers', '*');

    header("Access-Control-Allow-Credentials: true"); // Permitir envio de cookies/sessão
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    echo json_encode([
        "session_id" => session_id(),
        "usuario" =>  $_SESSION['usuario']
    ]);
?>