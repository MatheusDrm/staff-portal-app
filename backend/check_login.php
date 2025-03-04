<?php
    session_start();
    header("Content-Type: application/json");

    // Configurar corretamente os headers CORS para permitir cookies/sessões
    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permite chamadas do frontend
    header("Access-Control-Allow-Credentials: true"); // Permite envio de cookies (sessão)
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    // Responder imediatamente a requisições OPTIONS (preflight)
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
        http_response_code(204);
        exit();
    }

    // Verificar se a sessão está sendo mantida
    $usuarioLogado = isset($_SESSION['usuario']);
    // $usuarioLogado = true;

    $response = [
        "usuarioLogado" => $usuarioLogado,
        "session_id" => session_id(), // Para depuração
    ];

    echo json_encode($response);
?>
