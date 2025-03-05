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

    // Defina a URL base do frontend
    $FRONTEND_URL = "http://localhost:8080"; // Mude para "http://frontend:80" no Docker

    // Verifica se o usuário está logado
    $usuarioLogado = isset($_SESSION['usuario']) ? true : false;

    // HTML do header gerado dinamicamente
    $headerHtml = '
    <header>
        <nav>
            <h2>Matriz de Ensaios</h2>
            <ul>
                <li><a href="'.$FRONTEND_URL.'/home.html">Home</a></li>
                <li><a href="'.$FRONTEND_URL.'/user_page.html">User Profile</a></li>';

    if ($usuarioLogado) {
        $headerHtml .= '<li><button class="logout">Logout</button></li>';
    }

    $headerHtml .= '
            </ul>
        </nav>
    </header>';

    echo json_encode(["success" => true, "html" => $headerHtml]);
    exit();
?>
