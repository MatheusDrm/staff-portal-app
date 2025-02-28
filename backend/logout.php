<?php
    session_start();
    session_unset();
    session_destroy(); // Destroi a sessão

    // Retorna JSON indicando que o logout foi bem-sucedido
    header("Content-Type: application/json");
    echo json_encode(["success" => true, "message" => "Logout realizado com sucesso"]);
    exit();
?>
