<?php

    session_start();

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permitir chamadas do frontend
    // header("Access-Control-Allow-Origin: http://frontend:80"); // Permitir chamadas do frontend no Docker
    // header('Access-Control-Allow-Origin', '*');
    // header('Access-Control-Allow-Methods', '*');
    // header('Access-Control-Allow-Headers', '*');

    // header("Access-Control-Allow-Origin: $allowed_origin");
    header("Access-Control-Allow-Credentials: true"); // Permitir envio de cookies/sessão
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST");

    // define('DB_HOST', 'db');
    // define('DB_USER', 'matheusdrm');
    // define('DB_PASSWORD', 'L4mp3j0_978_675_!');
    // define('DB_NAME', 'matrizEnsaios');

    define('DB_HOST', getenv('DB_HOST'));
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));

    try{
        $pdo_conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "; charset=utf8", DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

?>