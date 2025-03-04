<?php

    session_start();

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permitir chamadas do frontend
    header("Access-Control-Allow-Credentials: true"); // Permitir envio de cookies/sessão
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST");

    if ($_SERVER['REQUEST_URI'] === "/favicon.ico") {
        http_response_code(204);
        exit();
    }

    // Verificar se a sessão está sendo mantida
    $usuarioLogado = isset($_SESSION['usuario']);

    echo $_SESSION['usuario'];

    $response = [
        "usuarioLogado" => $usuarioLogado,
        "session_id" => session_id(), // Para depuração
    ];

    echo json_encode($response);
?>
