<?php  
    define('DB_HOST', 'localhost');
    define('DB_USER', 'matheusdrm');
    define('DB_PASSWORD', 'drm978');
    define('DB_NAME', 'matriz_ensaios');

    try{
        $pdo_conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "; charset=utf8", DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

?>