<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Max-Age: 86400"); 

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