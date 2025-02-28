<?php  
    define('DB_HOST', 'localhost');
    define('DB_USER', 'matheusdrm');
    define('DB_PASSWORD', 'drm978');
    define('DB_NAME', 'matriz_ensaios');

    try{
        $mysqli_conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }
    catch(mysqli_sql_exception){
        die('Connection Failed ' . $conn->connect_error);
    }

?>