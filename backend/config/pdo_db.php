<?php

    session_start();

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permitir chamadas do frontend
    header("Access-Control-Allow-Credentials: true"); // Permitir envio de cookies/sessão
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST");

    define('DB_HOST', 'localhost');
    define('DB_USER', 'matheusdrm');
    define('DB_PASSWORD', 'L4mp3j0_978_675_!');
    define('DB_NAME', 'matrizEnsaios');

    try{
        $pdo_conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "; charset=utf8", DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

?>